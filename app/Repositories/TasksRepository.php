<?php

namespace App\Repositories;

use App\Models\Task;

class TasksRepository
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Task::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Task::find($id);
    }

    /**
     * @return bool
     */
    public function create()
    {
        $task = new Task;
        $task->name = request('name');
        $task->user_id = request('user_id');

        return $task->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $task = Task::find($id);

        if(request()->has('name')) {
            $task->name = request('name');
        }
        if(request()->has('user_id')) {
            $task->user_id = request('user_id');
        }

        return $task->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $task = Task::find($id);

        return $task->delete();
    }

}