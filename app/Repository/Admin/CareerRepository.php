<?php

namespace App\Repository\Admin;

use App\Models\Career;

class CareerRepository
{
    public function all()
    {
        return Career::latest()->get();
    }

    public function store(array $data)
    {
        return Career::create($data);
    }

    public function update(Career $career, array $data)
    {
        return $career->update($data);
    }

    public function delete(Career $career)
    {
        return $career->delete();
    }
}
