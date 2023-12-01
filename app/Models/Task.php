<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'description',
        'due_date',
        'assigned_to',
        'completed'
    ];  

    public function assignedTo() {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}