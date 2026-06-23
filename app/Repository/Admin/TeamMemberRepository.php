<?php

namespace App\Repository\Admin;

use App\Models\TeamMember;
use Illuminate\Support\Facades\Storage;

class TeamMemberRepository
{
    public function all()
    {
        return TeamMember::orderBy('position')->latest()->get();
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('team-members', 'public');
        }

        return TeamMember::create($data);
    }

    public function update(TeamMember $teamMember, array $data)
    {
        if (isset($data['image'])) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }

            $data['image'] = $data['image']->store('team-members', 'public');
        }

        return $teamMember->update($data);
    }

    public function delete(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        return $teamMember->delete();
    }
}
