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

class Category extends Model implements HasMedia
{
    use HasFactory, LogsActivity, HasSlug, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'show_menu',
        'status',
    ];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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
        return $this->getFirstMediaUrl('categories');
    }

    
    /**
     * The function to get books Attribute.
     */
    public function getBooksAttribute()
    {
        if($this->parent_id) {
            return $this->products->count();
        } else {
            $childs = $this->children;
            $ids = convertRowsToIds($childs, 'id');
            return Product::whereIn('category_id', $ids)->count();
        }
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
     * The Category that has many Sub Categories.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    /**
     * The Child that has One Category.
     */
    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    /**
     * The Category that Many Products.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
