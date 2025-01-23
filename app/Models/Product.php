<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia
{
    use HasFactory, LogsActivity, HasSlug, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'intro',
        'description',
        'author',
        'demo',
        'source',
        'teacher_resources',
        'status',
    ];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
        return $this->getFirstMediaUrl('products');
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

    /**
     * The Product that has One Category.
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * The Product that has many details.
     */
    public function details()
    {
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }
    
    /**
     * The Product that has many Serial.
     */
    public function serials()
    {
        return $this->hasMany(Serial::class, 'product_id', 'id');
    }

}
