<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'category_id', 'title', 'description', 'due_date', 'status'];

    // Static status constants
    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';

    const STATUS_ARR = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_IN_PROGRESS => 'In Progress',
        self::STATUS_COMPLETED => 'Completed',
    ];

    /**
     * Define the relationship with the TaskCategory model
     * A Task belongs to a TaskCategory
     */
    public function category()
    {
        return $this->belongsTo(TaskCategory::class, 'category_id', 'id');
    }

    /**
     * Define the relationship with the User model
     * A Task belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
