<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this['id'],
            "comment" => $this['comment'],
            "task_id" => $this['task_id'],
            "created" => $this['created_at']
        ];
    }
}
