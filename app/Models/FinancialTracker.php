<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialTracker extends Model
{
    protected $table = 'financial_trackers';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'category_id', 'title', 'amount', 'due_date', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    // Static status constants
    const STATUS_PENDING = 'pending';
    const STATUS_RECEIVED = 'received';

    const STATUS_ARR = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_RECEIVED => 'Received',
    ];

    /**
     * Define the relationship with the FinancialCategory model
     * A FinancialTracker belongs to a FinancialCategory
     */
    public function category()
    {
        return $this->belongsTo(FinancialCategory::class, 'category_id', 'id');
    }

    /**
     * Define the relationship with the User model
     * A FinancialTracker belongs to a User
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
