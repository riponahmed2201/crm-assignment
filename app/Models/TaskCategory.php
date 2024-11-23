<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    protected $table = 'task_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name', 'description'];


    /**
     * Define the relationship with the Task model
     * A TaskCategory can have many Tasks
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'category_id', 'id');
    }
}
