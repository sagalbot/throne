<?php

namespace App\Http\Resources;

class GroupResource extends GitLabResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                             => $this->id,
            'name'                           => $this->name,
            'web_url'                        => $this->web_url,
            "plan"                           => $this->get('plan', 'free'),
            "full_path"                      => $this->full_path,
            "parent_id"                      => $this->get('parent_id', null),
            "avatar_url"                     => $this->avatar_url,
            "billable_members_count"         => $this->get('billable_members_count', 0),
            "members_count_with_descendants" => $this->get('members_count_with_descendants', 0),
            "project_members"                => $this->getProjectMembers(),
        ];
    }

    protected function getProjectMembers()
    {
        return (int) $this->get('billable_members_count', 0) - (int) $this->get('members_count_with_descendants', 0);
    }
}
