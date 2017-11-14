<?php

namespace App\Acme\Transformers;

class CommentTransformer extends Transformer
{

    /**
     * Comment Transform
     *
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        return [
            "id" => $item['id'],
            "comment" => $item['comment'],
            "task_id" => $item['task_id'],
            "created" => $item['created_at']
        ];
    }

}