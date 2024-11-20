<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicRole extends Model
{
    protected $table = 'academic_roles';
    protected $primaryKey = 'id';
    protected $fillable = ['role_name', 'description'];
}
