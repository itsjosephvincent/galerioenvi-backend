<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainee extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'training_certification_id',
        'name',
        'certificate_no',
        'training_date_from',
        'training_date_to'
    ];

    public function training_certificate()
    {
        return $this->belongsTo(TrainingCertification::class);
    }
}
