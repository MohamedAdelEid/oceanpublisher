<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'link',
        'status',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = ['image'];
    
    
    /**
     * The function to get Image Attribute.
     */
    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('sliders');
    }

    /**
     * The function to describe the log record.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
            ->useLogName((auth()->check()) ? auth()->user()->full_name : 'Seeder');
    }
}
