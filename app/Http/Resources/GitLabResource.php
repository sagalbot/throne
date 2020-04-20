<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GitLabResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->resource = (object) $resource;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function get($key, $default = null)
    {
        if( property_exists($this->resource, $key) ) {
            return $this->resource->$key;
        }

        return $default;
    }
}
