<?php

namespace App\Http\Controllers;

use Gitlab\Client;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Gitlab\ResultPager;
use App\Cache\GitLabCacheKey;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\GroupResource;

class ShowNamespacesController extends Controller
{
    /**
     * @var string
     */
    protected $key;

    public function __construct(GitLabCacheKey $key)
    {
        $this->key = $key('group', 'one', 'four');
    }

    public function __invoke(Client $client, ResultPager $pager)
    {
        if (Cache::missing($this->key)) {

            $groups = collect($client->namespaces()->all())->map(function ($group) {
                    if (is_null($group['parent_id'])) {
                        $group['parent_id'] = 'root';
                    }

                    return $group;
                })->groupBy('parent_id')->map(function (Collection $grouped) {
                    return GroupResource::collection($grouped->sortByDesc('billable_members_count'));
                });

            Cache::put($this->key, $groups);
        } else {
            $groups = Cache::get($this->key);
        }

        return Inertia::render('Groups', [
            'groups' => $groups,
        ]);
    }
}
