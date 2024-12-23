<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $table = 'calendar_events';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'task_id', 'title', 'event_date', 'reminder', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Define the relationship with the User model
     * A Calender Event belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with the Task model
     * A Calender Event belongs to a User
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
