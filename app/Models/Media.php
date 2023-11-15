<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function posts()
    {
        return $this->morphToMany(Post::class, 'sourceable', 'model_has_media');
    }

    public function products()
    {
        return $this->morphToMany(Product::class, 'sourceable', 'model_has_media');
    }

    public function downloadCenters()
    {
        return $this->morphToMany(DownloadCenter::class, 'sourceable', 'model_has_media');
    }

    public function company()
    {
        return $this->morphToMany(Company::class, 'sourceable', 'model_has_media');
    }
}
