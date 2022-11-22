<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingCertification extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'training_id',
        'name'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
