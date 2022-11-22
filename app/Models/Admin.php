<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Admin extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasApiTokens, InteractsWithMedia, Filterable;

    protected $guard_name = 'web';

    protected  $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'confirmed_at',
        'img_url',
        'is_active',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('admin_media')->useDisk('admin');
    }

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
