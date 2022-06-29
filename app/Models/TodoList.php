<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TodoList extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_id'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

}
