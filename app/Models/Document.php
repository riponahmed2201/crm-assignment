<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'title', 'file_path', 'tags', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Define the relationship with the User model
     * A Document belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
