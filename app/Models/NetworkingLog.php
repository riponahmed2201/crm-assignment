<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NetworkingLog extends Model
{
    protected $table = 'networking_logs';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'contact_id', 'meeting_date', 'notes', 'follow_up_date'];

    /**
     * Define the relationship with the User model
     * A NetworkingLog belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with the Contact model
     * A NetworkingLog belongs to a User
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
}
