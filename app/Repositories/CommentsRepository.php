<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentsRepository
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Comment::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Comment::find($id);
    }

    /**
     * @return bool
     */
    public function create()
    {
        $comment = new Comment;
        $comment->comment = request('comment');
        $comment->task_id = request('task_id');

        return $comment->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $comment = Comment::find($id);

        if(request()->has('comment')) {
            $comment->comment = request('comment');
        }
        if(request()->has('task_id')) {
            $comment->task_id = request('task_id');
        }

        return $comment->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $comment = Comment::find($id);

        return $comment->delete();
    }

}