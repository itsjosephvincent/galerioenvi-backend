<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use EloquentFilter\Filterable;

class About extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected  $fillable = [
        'description',
        'mission',
        'vision'
    ];
}
