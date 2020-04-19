<?php

namespace App\Http\Gitlab;

use Gitlab\Api\ApiInterface;
use Gitlab\ResultPager;
use Gitlab\ResultPagerInterface;
use Illuminate\Support\Collection;

class Pager extends ResultPager implements ResultPagerInterface
{
    public function fetchAll(ApiInterface $api, $method, array $parameters = []): Collection
    {
        $result = parent::fetchAll($api, $method, $parameters);

        return collect($result);
    }
}
