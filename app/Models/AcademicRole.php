<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicRole extends Model
{
    protected $table = 'academic_roles';
    protected $primaryKey = 'id';
    protected $fillable = ['role_name', 'description', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Define the relationship with the Contact model
     * An AcademicRole can have many Contacts
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'academic_role_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
