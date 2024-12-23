<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialCategory extends Model
{
    protected $table = 'financial_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name', 'description', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
