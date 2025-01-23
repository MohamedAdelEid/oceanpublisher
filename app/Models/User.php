<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Avatar;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'phone',
        'email',
        'password',
        'school',
        'job',
        'is_admin',
        'status', // ['active', 'suspended', 'closed']
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = ['image', 'avatar'];
    
    
    /**
     * The function to get Image Attribute.
     */
    public function getImageAttribute()
    {
        return ($this->getMedia('avatars')->count()) ? $this->getFirstMediaUrl('avatars') : Avatar::create($this->full_name)->setTheme('colorful')->setDimension('30')->setFontSize(11)->toBase64();
    }

    /**
     * The function to get Avatar Attribute.
     */
    public function getAvatarAttribute()
    {
       return Avatar::create($this->full_name)->setTheme('colorful')->setDimension('30')->setFontSize(15)->toSvg();
    }

    /**
     * The function to describe the log record.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}");
    }

}
