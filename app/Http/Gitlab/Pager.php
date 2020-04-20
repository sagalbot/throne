<?php

namespace App\Http\Gitlab;

use Gitlab\Api\ApiInterface;
use Gitlab\ResultPagerInterface;
use Illuminate\Support\Collection;

class Pager extends \Gitlab\ResultPager implements ResultPagerInterface
{
    public function fetchAll(ApiInterface $api, $method, array $parameters = []): Collection
    {
        $result = parent::fetchAll($api, $method, $parameters);

        return collect($result);
    }

    public function fetch(ApiInterface $api, $method, array $parameters = [])
    {
        return (object) parent::fetch($api, $method, $parameters);
    }
}
