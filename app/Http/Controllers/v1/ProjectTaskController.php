<?php

namespace App\Http\Controllers\v1;

use App\Repositories\TasksRepository;
use Illuminate\Http\Request;

use App\Repositories\ProjectRepository;
use App\Http\Resources\Task as TaskResource;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\TaskCollection;

class ProjectTaskController extends ApiController
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * @var TasksRepository
     */
    protected $taskResource;

    /**
     * ProjectTaskController constructor.
     * @param ProjectRepository $projectRepository
     * @param TasksRepository $tasksRepository
     * @internal param TaskResource $taskResource
     */
    function __construct(ProjectRepository $projectRepository, TasksRepository $tasksRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->taskResource = $tasksRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projectId)
    {
        $project = $this->projectRepository->find($projectId);

        if( ! $project) {
            return $this->respondNotFound('Project not found');
        }

        $projectResource = new ProjectResource($project);
        $projectTasks = new TaskCollection($project->tasks);

        return array_merge(['project' => $projectResource], ['tasks' => $projectTasks]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
