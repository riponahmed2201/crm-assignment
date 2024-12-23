<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    protected $table = 'task_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name', 'description', 'created_by', 'updated_by', 'created_at', 'updated_at'];


    /**
     * Define the relationship with the Task model
     * A TaskCategory can have many Tasks
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'category_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
