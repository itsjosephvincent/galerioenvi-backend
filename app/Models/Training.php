<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Training extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, Filterable, HasSlug;

    protected $fillable = [
        'thumbnail_url',
        'title',
        'description',
        'date_from',
        'date_to',
        'location'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('training_media')->useDisk('training');
    }

    public function certificates()
    {
        return $this->hasMany(TrainingCertification::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
