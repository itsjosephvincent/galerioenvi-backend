<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Landing extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = 'landing';

    protected $fillable = [
        'header_text',
        'video_url'
    ];
}
