<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'academic_role_id', 'name', 'organization', 'email', 'phone', 'notes'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function academicRole()
    {
        return $this->hasOne(AcademicRole::class);
    }
}
