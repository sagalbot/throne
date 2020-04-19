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
    protected $group;

    /**
     * @var string
     */
    protected $key;

    public function __construct(Request $request)
    {
        $this->group = $request->route('namespace');
        $this->key = "group-{$this->group}";
    }

    public function __invoke(Client $client)
    {
        $pager = new ResultPager($client);


        //$projects = $client->projects()

        if (Cache::missing($this->key)) {
            $groupMembers = collect($client->groups()->members($this->group));
            $allMembers = collect($client->groups()->allMembers($this->group));

            $projects = $pager->fetchAll($client->api('groups'), 'projects', [
                $this->group,
                ['simple' => true],
            ]);

            $projectMembers = collect($projects)->map(function ($project) use ($pager, $client) {
                $project['allMembers'] = $pager->fetchAll($client->api('projects'), 'allMembers', [$project['id']]);
                $project['members'] = $pager->fetchAll($client->api('projects'), 'allMembers', [$project['id']]);

                return collect($project)->pluck([
                    'allMembers',
                    'members',
                    'id',
                    'description',
                    'name',
                    'path',
                    'avatar_url',
                    'web_url',
                ]);
            });

            $props = [
                'projectsWithMembers' => $projectMembers,
                'groupMembers'        => $groupMembers,
                'allMembers'          => $allMembers,
                'group'               => $client->groups()->show($this->group),
            ];

            dd($props);

            //Cache::put($this->key, $props);
        } else {
            $props = Cache::get($this->key);
        }

        return Inertia::render('Group', $props);
    }
}
