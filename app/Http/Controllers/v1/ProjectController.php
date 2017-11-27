<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\ProjectRequest;
use App\Repositories\ProjectRepository;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\ProjectCollection;

class ProjectController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectRepository $projectRepository)
    {
        return new ProjectCollection($projectRepository->paginate());
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
    public function store(ProjectRequest $request, ProjectRepository $projectRepository)
    {
        if($projectRepository->create()) {
            return $this->respondSuccess('Project created', 201);
        }

        return $this->respondError('Failed to create', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ProjectRepository $projectRepository)
    {
        $project = $projectRepository->find($id);

        if( ! $project) {
            return $this->respondNotFound('Project not found');
        }

        return new ProjectResource($project);
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
    public function update(ProjectRequest $request, $id, ProjectRepository $projectRepository)
    {
        if( ! $projectRepository->find($id)) {
            return $this->respondNotFound('Project not found');
        }

        if($projectRepository->update($id)) {
            return $this->respondSuccess('Project updated');
        }

        return $this->respondError('Failed to update', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ProjectRepository $projectRepository)
    {
        if( !  $projectRepository->find($id)) {
            return $this->respondNotFound('Project not found');
        }

        if( ! $projectRepository->delete($id)) {
            return $this->respondError('Failed to save', 500);
        }

        return $this->respondSuccess('Project deleted');
    }
}
