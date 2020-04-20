<?php

namespace App;

use App\Cache\GitLabCacheKey;
use App\Http\Gitlab\Pager;
use Gitlab\Client;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
        'refresh_token',
        'remember_token',
    ];

    public function namespaces(): Collection
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('namespaces');

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);

            $namespaces = $pager->fetchAll($client->namespaces(), 'all');

            Cache::put($key, $namespaces);
        }

        return Cache::get($key);
    }

    public function group(int $id)
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('group', $id);

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);

            $group = $pager->fetch($client->api('groups'), 'show', [$id]);

            Cache::put($key, $group);
        }

        return Cache::get($key);
    }

    public function groups(): Collection
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('groups');

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);

            $groups = $pager->fetchAll($client->groups(), 'all');

            Cache::put($key, $groups);
        }

        return Cache::get($key);
    }

    public function subgroups(int $groupId)
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('subgroups', $groupId);

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);
            $groups = $pager->fetchAll($client->groups(), 'subgroups', [$groupId]);

            Cache::put($key, $groups);
        }

        return Cache::get($key);
    }

    public function projects(): Collection
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('projects');

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);
            $projects = $pager->fetchAll($client->projects(), 'all', [['membership' => true]]);

            Cache::put($key, collect($projects));
        }

        return Cache::get($key);
    }

    public function project(int $projectId)
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('project', $projectId);

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);

            $project = $pager->fetch($client->api('projects'), 'show', [$projectId]);

            Cache::put($key, $project);
        }

        return Cache::get($key);
    }

    public function projectMembers(int $id)
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('project.members', $id);

        if (Cache::missing($key)) {
            Cache::put($key, $this->getMembersFor('projects', $id));
        }

        return Cache::get($key);
    }

    public function groupMembers(int $id)
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('group.members', $id);

        if (Cache::missing($key)) {
            Cache::put($key, $this->getMembersFor('groups', $id));
        }

        return Cache::get($key);
    }

    private function getMembersFor(string $type, int $id, $inherited = false)
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)("{$type}.members", $id);

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);

            $members = $pager->fetchAll($client->api($type), $inherited ? 'allMembers' : 'members', [$id]);

            Cache::put($key, $members);
        }

        return Cache::get($key);
    }

    public function projectsInGroup(int $groupId): Collection
    {
        /** @var GitLabCacheKey $key */
        $key = resolve(GitLabCacheKey::class)('projectsInGroup', $groupId);

        if (Cache::missing($key)) {
            /** @var Client $client */
            $client = resolve(Client::class);
            $pager = new Pager($client);
            $result = $pager->fetchAll($client->groups(), 'projects', [
                $groupId,
                ['simple' => true],
            ]);

            Cache::put($key, $result);
        }

        return Cache::get($key);
    }
}
