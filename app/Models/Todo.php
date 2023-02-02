<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'task_level',
        'is_completed'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($todo) {
            $todo->user_id = auth()->id();
        });
    }
}
