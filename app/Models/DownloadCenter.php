<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownloadCenter extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsToMany(
            Media::class,
            'download_center_has_media',
            'download_center_id',
            'media_id'
        )->withTimestamps();
    }
}
