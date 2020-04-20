<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Collection;
use App\Http\Resources\GroupResource;

class ShowNameSpacesController extends Controller
{
    public function __invoke()
    {
        $groups = auth()->user()->namespaces()->map(function ($group) {
            if (is_null($group['parent_id'])) {
                $group['parent_id'] = 'root';
            }

            return $group;
        })->groupBy('parent_id')->map(function (Collection $grouped) {
            return GroupResource::collection($grouped->sortByDesc('billable_members_count'));
        });

        return Inertia::render('ShowNameSpaces', [
            'groups' => $groups,
        ]);
    }
}
