<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TraineeRepositoryInterface;
use App\Models\Trainee;

class TraineeRepository implements TraineeRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Trainee::filter($payload->all())
            ->where('training_certification_id', $payload->certificate_id)
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $trainee = new Trainee();
        $trainee->training_certification_id = $payload->training_certification_id;
        $trainee->name = $payload->name;
        $trainee->certificate_no = $payload->certificate_no;
        $trainee->training_date_from = $payload->training_date_from;
        $trainee->training_date_to = $payload->training_date_to;
        $trainee->save();

        return $trainee->fresh();
    }

    public function show($traineeId)
    {
        return Trainee::findOrFail($traineeId);
    }

    public function update($payload, $traineeId)
    {
        $trainee = Trainee::findOrFail($traineeId);
        $trainee->name = $payload->name;
        $trainee->certificate_no = $payload->certificate_no;
        $trainee->training_date_from = $payload->training_date_from;
        $trainee->training_date_to = $payload->training_date_to;
        $trainee->save();

        return $trainee->fresh();
    }

    public function delete($traineeId)
    {
        return Trainee::findOrFail($traineeId)->delete();
    }
}
