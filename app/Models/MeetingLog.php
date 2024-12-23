<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingLog extends Model
{
    protected $table = 'meeting_logs';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'contact_id', 'meeting_date', 'file', 'notes', 'follow_up_date', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Define the relationship with the User model
     * A MeetingLog belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with the Contact model
     * A MeetingLog belongs to a User
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
