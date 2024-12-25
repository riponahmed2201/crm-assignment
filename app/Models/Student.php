<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'department', 'batch', 'program', 'student_id', 'date_of_birth', 'address', 'profile_picture', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}
