<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ShowNameSpaceController extends Controller
{
    /**
     * @var \Illuminate\Routing\Route|object|string|null
     */
    protected $nameSpaceId;

    public function __construct(Request $request)
    {
        $this->nameSpaceId = $request->route('namespace');
    }

    public function __invoke()
    {
        /** @var \App\User $user */
        $user = auth()->user();

        $projectsWithMembers = $user->projectsInGroup($this->nameSpaceId)->map(function (
            $project
        ) use (
            $user
        ) {
            $members = $user->projectMembers($project['id']);

            $project['members'] = $members;
            $project['memberCount'] = $members->count();

            return $project;
        })->sortByDesc('memberCount');

        $props = [
            'namespace'           => $user->group($this->nameSpaceId),
            'members'             => $user->groupMembers($this->nameSpaceId),
            'projectsWithMembers' => $projectsWithMembers,
        ];

        return Inertia::render('ShowNameSpace', $props);
    }
}
