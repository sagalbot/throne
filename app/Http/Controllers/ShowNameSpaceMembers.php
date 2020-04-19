<?php

namespace App\Http\Controllers;

use Gitlab\Client;
use Gitlab\ResultPager;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ShowNameSpaceMembers extends Controller
{
    /**
     * @var \Illuminate\Routing\Route|object|string|null
     */
    protected $nameSpaceId;

    public function __construct(Request $request)
    {
        $this->nameSpaceId = $request->route('namespace');
    }

    public function __invoke(Client $client)
    {
        /** @var \App\User $user */
        $user = auth()->user();

        $props = [
            'namespace' => $user->group($this->nameSpaceId),
            'members' => $user->groupMembers($this->nameSpaceId)
        ];

        return $props;

        //return Inertia::render('Group', $props);
    }
}
