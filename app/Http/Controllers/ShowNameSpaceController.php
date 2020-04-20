<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

        $projects = $user->projectsInGroup($this->nameSpaceId);

        $projectMembers = $projects->mapWithKeys(function ($project) use ($user) {
            return [
                $project['id'] => $user->projectMembers($project['id'])->map(function ($member) {
                    return $member['id'];
                }),
            ];
        });

        $members = $projects->reduce(function (Collection $members, $project) use ($user) {
            $user->projectMembers($project['id'])->each(function ($projectMember) use ($members) {
                if (! $members->firstWhere('id', $projectMember['id'])) {
                    $members->push($projectMember);
                }
            });

            return $members;
        }, collect([]));

        $props = [
            'namespace'      => $user->group($this->nameSpaceId),
            'groupMembers'   => $user->groupMembers($this->nameSpaceId),
            'projectMembers' => $projectMembers,
            'members'        => $members,
            'projects'       => $projects,
        ];

        return Inertia::render('ShowNameSpace', $props);
    }
}
