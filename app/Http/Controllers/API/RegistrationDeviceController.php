<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Serial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistrationDeviceController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'device_number' => 'required|string|max:250',
                'serial_number' => 'required|exist:serials,serial_number',
            ]);
            $deviceNumber = $request->device_number;
            $serialNumber = $request->serial_number;
            $serial = Serial::where('number', $serialNumber)->first();

            $device = Device::where('device_number', $request->device_number)->first();
            // Check if the device is already registered or not
            if ($device) {
                $serialDevice = $device->serials()->where('serial_number', $serialNumber)->first();
                // Check if the serial number is already registered to the device
                if ($serialDevice) {
                    return response()
                        ->json(
                            [
                                'status' => true,
                                'message' => "Device already registered",
                                'data' => [
                                    'serial' => $serialNumber,
                                    'device_number' => $deviceNumber,
                                    'product_name' => $serial->product->title,
                                    'expire_date' => Carbon::parse($serial->enddate)->timestamp
                                ]
                            ],
                            200
                        );
                } else {
                    $serialExist = $serial->devices()->exists();
                    // Check if the serial number is already registered to another device or not
                    if ($serialExist) {
                        return response()
                            ->json(
                                [
                                    'status' => false,
                                    'message' => "Serial number already registered to another device",
                                ],
                                400
                            );
                    } else {
                        $device->serials()->attach($serialNumber);
                        return response()
                            ->json(
                                [
                                    'status' => true,
                                    'message' => "Device registered successfully",
                                    'data' => [
                                        'serial' => $serialNumber,
                                        'device_number' => $deviceNumber,
                                        'product_name' => $serial->product->title,
                                        'expire_date' => Carbon::parse($serial->enddate)->timestamp
                                    ]
                                ],
                                200
                            );
                    }
                } 
            } else {
                $device = Device::create(['device_number' => $deviceNumber]);
                $serialExist = $serial->devices()->exists();
                // Check if the serial number is already registered to another device or not
                if ($serialExist) {
                    return response()
                        ->json(
                            [
                                'status' => false,
                                'message' => "Serial number already registered to another device",
                            ],
                            400
                        );
                } else {
                    $device->serials()->attach($serialNumber);

                    return response()
                        ->json(
                            [
                                'status' => true,
                                'message' => "Device registered successfully",
                                'data' => [
                                    'serial' => $serialNumber,
                                    'device_number' => $deviceNumber,
                                    'product_name' => $serial->product->title,
                                    'expire_date' => Carbon::parse($serial->enddate)->timestamp
                                ]
                            ],
                            200
                        );
                }
            }

        } catch (\Exception $e) {
        }
    }

    /**
     * Check if the serial number is valid
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkSerial(Request $request)
    {
        //
    }
}
