<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\TaskRequest;
use App\Repositories\TasksRepository;
use App\Http\Resources\Task as TaskResource;
use App\Http\Resources\TaskCollection;

class TaskController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TasksRepository $tasksRepository)
    {
        return new TaskCollection($tasksRepository->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskRequest $request, TasksRepository $tasksRepository)
    {
        $tasksRepository->create();

        return $this->respondSuccess('task created',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, TasksRepository $tasksRepository)
    {
        $task = $tasksRepository->find($id);

        if( ! $task) {
            return $this->respondNotFound('task not found');
        }

        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id, TasksRepository $tasksRepository)
    {
        if( ! $tasksRepository->find($id)) {
            return $this->respondNotFound('task not found');
        }

        $tasksRepository->update($id);
        return $this->respondSuccess('task updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, TasksRepository $tasksRepository)
    {
        $task = $tasksRepository->find($id);

        if( ! $task) {
            return $this->respondNotFound('task not found');
        }

        $tasksRepository->delete($id);

        return $this->respondSuccess('task deleted');
    }
}
