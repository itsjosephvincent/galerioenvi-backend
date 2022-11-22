<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LandingFeaturedImage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Filterable;

    protected $fillable = [
        'name',
        'image_url'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('landing_media')->useDisk('landing');
    }
}
