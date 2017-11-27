<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    /**
     * @return mixed
     */
    public function paginate() {
        $limit = request('limit') ?: 50;
        return Project::paginate($limit);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        return Project::find($id);
    }

    /**
     * @return bool
     */
    public function create()
    {
        $project = new Project;
        $project->name = request('name');

        return $project->save();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $project = Project::find($id);

        if(request()->has('name')) {
            $project->name = request('name');
        }

        return $project->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $project = Project::find($id);

        return $project->delete();
    }
}
