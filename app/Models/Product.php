<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'sourceable', 'model_has_media');
    }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function urls()
    {
        return $this->hasMany(ProductUrl::class, 'product_id');
    }
}
