<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Serial;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegistrationDeviceController extends Controller
{
    // Define response constants
    private const HTTP_OK = 200;
    private const HTTP_BAD_REQUEST = 400;
    private const HTTP_CONFLICT = 409;
    private const HTTP_VALIDATION_ERROR = 422;

    /**
     * Store a newly created device registration.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $this->validateStoreRequest($request);
            $deviceNumber = $validated['device_number'];
            $serialNumber = $validated['serial_number'];

            $serial = $this->getSerialOrFail($serialNumber);
            $device = Device::where('device_number', $deviceNumber)->first();

            if ($device) {
                return $this->handleExistingDevice($device, $serial, $deviceNumber);
            }

            return $this->handleNewDevice($deviceNumber, $serial);

        } catch (ValidationException $e) {
            return $this->validationErrorResponse($e);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Check if the serial number is valid.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function checkSerial(Request $request): JsonResponse
    {
        try {
            $validated = $this->validateCheckSerialRequest($request);

            $exists = $this->checkSerialDeviceAssociation(
                $validated['device_number'],
                $validated['serial_number']
            );

            return $exists
                ? $this->successResponse('Serial number is valid')
                : $this->errorResponse('Serial number is Invalid', self::HTTP_BAD_REQUEST);

        } catch (ValidationException $e) {
            return $this->validationErrorResponse($e);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Validate store request data.
     *
     * @param Request $request
     * @return array
     */
    private function validateStoreRequest(Request $request): array
    {
        return $request->validate([
            'device_number' => 'required|string|max:250',
            'serial_number' => 'required|exists:serials,number',
        ]);
    }

    /**
     * Validate check serial request data.
     *
     * @param Request $request
     * @return array
     */
    private function validateCheckSerialRequest(Request $request): array
    {
        return $request->validate([
            'device_number' => 'required|exists:devices,device_number',
            'serial_number' => 'required|exists:serials,number',
        ]);
    }

    /**
     * Get serial or fail.
     *
     * @param string $serialNumber
     * @return Serial
     */
    private function getSerialOrFail(string $serialNumber): Serial
    {
        return Serial::where('number', $serialNumber)->firstOrFail();
    }

    /**
     * Handle existing device registration.
     *
     * @param Device $device
     * @param Serial $serial
     * @param string $deviceNumber
     * @return JsonResponse
     */
    private function handleExistingDevice(Device $device, Serial $serial, string $deviceNumber): JsonResponse
    {
        $serialDevice = $device->serials()->where('number', $serial->number)->first();

        if ($serialDevice) {
            return $this->successResponse(
                "Device already registered",
                $this->getDeviceData($serial, $deviceNumber)
            );
        }

        if ($serial->devices()->exists()) {
            return $this->errorResponse(
                "Serial number already registered to another device",
                self::HTTP_CONFLICT
            );
        }

        $device->serials()->attach($serial->id);
        return $this->successResponse(
            "Device registered successfully",
            $this->getDeviceData($serial, $deviceNumber)
        );
    }

    /**
     * Handle new device registration.
     *
     * @param string $deviceNumber
     * @param Serial $serial
     * @return JsonResponse
     */
    private function handleNewDevice(string $deviceNumber, Serial $serial): JsonResponse
    {
        if ($serial->devices()->exists()) {
            return $this->errorResponse(
                "Serial number already registered to another device",
                self::HTTP_CONFLICT
            );
        }

        $device = Device::create(['device_number' => $deviceNumber]);
        $device->serials()->attach($serial->id);

        return $this->successResponse(
            "Device registered successfully",
            $this->getDeviceData($serial, $deviceNumber)
        );
    }

    /**
     * Check if serial is associated with device.
     *
     * @param string $deviceNumber
     * @param string $serialNumber
     * @return bool
     */
    private function checkSerialDeviceAssociation(string $deviceNumber, string $serialNumber): bool
    {
        return DB::table('device_serials')
            ->join('devices', 'device_serials.device_id', '=', 'devices.id')
            ->join('serials', 'device_serials.serial_id', '=', 'serials.id')
            ->where('devices.device_number', $deviceNumber)
            ->where('serials.number', $serialNumber)
            ->exists();
    }

    /**
     * Get formatted device data.
     *
     * @param Serial $serial
     * @param string $deviceNumber
     * @return array
     */
    private function getDeviceData(Serial $serial, string $deviceNumber): array
    {
        return [
            'serial' => $serial->number,
            'device_number' => $deviceNumber,
            'product_name' => $serial->product->title,
            'expire_date' => Carbon::parse($serial->enddate)->timestamp
        ];
    }

    /**
     * Return success response.
     *
     * @param string $message
     * @param array|null $data
     * @param int $code
     * @return JsonResponse
     */
    private function successResponse(string $message, ?array $data = null, int $code = self::HTTP_OK): JsonResponse
    {
        $response = [
            'status' => true,
            'message' => $message,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    /**
     * Return validation error response.
     *
     * @param ValidationException $e
     * @return JsonResponse
     */
    private function validationErrorResponse(ValidationException $e): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => 'The given data was invalid.',
            'errors' => $e->errors()
        ], self::HTTP_VALIDATION_ERROR);
    }

    /**
     * Return error response.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    private function errorResponse(string $message, int $code = self::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], $code);
    }
}
