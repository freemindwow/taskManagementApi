<?php

namespace App\Http\Controllers\v1;

use App\Acme\Transformers\TaskTransformer;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Repositories\TasksRepository;
use App\Models\Task;

class TaskController extends ApiController
{
    /**
     * UserController constructor.
     *
     * @param TaskTransformer $transformer
     */
    public function __construct(TaskTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TasksRepository $tasksRepository)
    {
        return $this->respond($this->transformer->transformCollection($tasksRepository->all()->toArray()), 200);
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
    public function store(CreateTaskRequest $request, TasksRepository $tasksRepository)
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

        if(!$task) {
            return $this->respondNotFound('task not found');
        }

        return $this->respond($this->transformer->transform(Task::find($id))) ;
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
    public function update(UpdateTaskRequest $request, $id, TasksRepository $tasksRepository)
    {
        if(!Task::find($id)) {
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
    public function destroy($id)
    {
        $task = Task::find($id);

        if(!$task) {
            return $this->respondNotFound('task not found');
        }

        $task->delete();

        return $this->respondSuccess('task deleted');
    }
}
