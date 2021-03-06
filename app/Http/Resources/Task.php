<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Task extends Resource
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
            "name" => $this['name'],
            "user_id" => $this['user_id'],
            "created" => $this['created_at']
        ];
    }
}
