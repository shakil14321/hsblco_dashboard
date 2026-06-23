<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamMemberRequest;
use App\Models\TeamMember;
use App\Repository\Admin\TeamMemberRepository;

class TeamMemberController extends Controller
{
    public function __construct(
        protected TeamMemberRepository $teamMemberRepository
    ) {}

    public function index()
    {
        $members = $this->teamMemberRepository->all();

        return view('admin.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(TeamMemberRequest $request)
    {
        $this->teamMemberRepository->store($request->validated());

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Team member created successfully.');
    }

    public function show(TeamMember $teamMember)
    {
        return view('admin.team-members.show', compact('teamMember'));
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(TeamMemberRequest $request, TeamMember $teamMember)
    {
        $this->teamMemberRepository->update($teamMember, $request->validated());

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $this->teamMemberRepository->delete($teamMember);

        return back()->with('success', 'Team member deleted successfully.');
    }
}
