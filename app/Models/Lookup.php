<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lookup extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_prefix',
        'title',
        'meta_tags',
        'address',
        'email',
        'phone',
        'whatsapp',
        'facebook',
        'twitter',
        'instagram',
        'about_us',
        'mission',
        'vision',
        'goals',
        'privacy_policy',
        'terms_conditions',
        'pages_seo',
    ];

    
    /**
     * Set PagesSeo Field.
     */
	public function setPagesSeoAttribute($value)
    {
        $this->attributes['pages_seo'] = json_encode($value);
    }

    /**
     * Get PagesSeo Field.
     */
    public function getPagesSeoAttribute()
    {
        return json_decode($this->attributes['pages_seo']);
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = ['about_image', 'logo', 'favicon'];
    
    
    /**
     * The function to get About Image Attribute.
     */
    public function getAboutImageAttribute()
    {
        return $this->getFirstMediaUrl('lookup_about');
    }

    /**
     * The function to get logo Attribute.
     */
    public function getLogoAttribute()
    {
        return $this->getFirstMediaUrl('lookup_logo');
    }

    /**
     * The function to get Favicon Attribute.
     */
    public function getFaviconAttribute()
    {
        return $this->getFirstMediaUrl('lookup_favicon');
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
