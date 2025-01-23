<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = ['device_number'];

    /**
     * The Device that has Many Serials.
     */
    public function serials()
    {
        return $this->belongsToMany(Serial::class, 'device_serials', 'device_id', 'serial_id');
    }
}
