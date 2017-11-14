<?php

namespace App\Models;

class Comment extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task_comments';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
