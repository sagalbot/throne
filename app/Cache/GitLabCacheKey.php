<?php

namespace App\Cache;

use App\User;

class GitLabCacheKey
{
    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected $user;

    public function __construct()
    {
        if (auth()->check()) {
            $this->user = auth()->user();
        } else {
            $this->user = new User(['id' => 0]);
        }
    }

    public function __invoke(...$args)
    {
        return $this->key(...$args);
    }

    public function key(...$args): string
    {
        return implode("-", array_merge(["user-".$this->user->id], $args));
    }
}
