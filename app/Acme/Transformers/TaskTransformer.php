<?php

namespace App\Acme\Transformers;

class TaskTransformer extends Transformer
{

    /**
     *  Task Transform
     *
     * @param $data
     * @return array
     */
    public function transform($data)
    {
        return [
            "id" => $data['id'],
            "name" => $data['name'],
            "user_id" => $data['user_id'],
            "created" => $data['created_at']
        ];
    }

}