<?php

namespace App\Repository\Admin;

use App\Models\CompanyStat;

class CompanyStatRepository
{
    public function all()
    {
        return CompanyStat::orderBy('position')
            ->latest()
            ->get();
    }

    public function store(array $data)
    {
        return CompanyStat::create($data);
    }

    public function update(CompanyStat $companyStat, array $data)
    {
        return $companyStat->update($data);
    }

    public function delete(CompanyStat $companyStat)
    {
        return $companyStat->delete();
    }
}
