<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $table = 'calendar_events';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'task_id', 'title', 'event_date', 'reminder'];
}
