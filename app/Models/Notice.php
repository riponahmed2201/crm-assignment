<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'type',
        'priority',
        'published_at',
        'expires_at',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'expires_at' => 'datetime', // Include all date fields you want to cast
    ];

    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('Y-m-d\TH:i') : null;
    }

    public function getFormattedExpiresAtAttribute()
    {
        return $this->expires_at ? $this->expires_at->format('Y-m-d\TH:i') : null;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
