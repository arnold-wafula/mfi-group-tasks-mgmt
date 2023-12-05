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
        'priority',
        'due_date',
        'assigned_to',
        'completed',
        'created_by',
    ];  

    /**
     * Many-to-many relationship to get the users assigned to this task.
     * The 'task_user' table is used as an intermediate table.
     */
    public function users() {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
    }

     /**
     * Many-to-many relationship to get the users assigned to this task.
     * The 'task_user' table is used as an intermediate table.
     */
    public function assignedTo() {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
    }

    /**
     * Many-to-one relationship to get the user who created this task.
     */
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Many-to-one relationship to get the creator with only the 'name' attribute.
     */
    public function creator() {
        return $this->belongsTo(User::class, 'created_by', 'name');
    }
}