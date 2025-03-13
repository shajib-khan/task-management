<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'priority',
        'status',
        'user_id', // ✅ Ensure this is here
    ];

    // Define the relationship: Each task belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
