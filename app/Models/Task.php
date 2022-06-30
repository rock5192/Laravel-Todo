<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const NotCompleted = "not completed";
    public const Completed = 'completed';
    public const Pending = 'pending';

    protected $fillable = ['title' , 'todo_list_id', 'status', 'label_id'];


    public function todo_list()
    {
        return $this->belongsTo(TodoList::class);
    }
}
