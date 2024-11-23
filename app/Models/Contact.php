<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'academic_role_id', 'name', 'organization', 'email', 'phone', 'notes'];

    /**
     * Define the relationship with the User model
     * A Contact belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with the AcademicRole model
     * A Contact belongs to an AcademicRole
     */
    public function academicRole()
    {
        return $this->belongsTo(AcademicRole::class, 'academic_role_id', 'id');
    }
}
