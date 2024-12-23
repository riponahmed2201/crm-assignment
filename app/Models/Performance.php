<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $table = 'performances';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'task_id', 'grade', 'completion_percentage', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Define the relationship with the User model
     * A Performance belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with the Task model
     * A Performance belongs to a User
     */
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
