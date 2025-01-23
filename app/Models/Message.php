<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Message extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'job_post',
        'educational_degree',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = ['file'];
    
    
    /**
     * The function to get CV File Attribute.
     */
    public function getFileAttribute()
    {
        return ($this->getMedia('cvs')->count()) ? $this->getFirstMediaUrl('cvs') : null;
    }

    /**
     * The function to describe the log record.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
            ->useLogName((auth()->check()) ? auth()->user()->full_name : 'GUEST');
    }
}
