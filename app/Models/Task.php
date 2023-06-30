<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'assigned_by_user_id',
        'task_prioritization',
        'due_date',
        'status',
    ];

    //for softdelete
    protected $dates = ['deleted_at'];

    //Table Relationship to user table 
    //public function user() 
    //{
    //    return $this->belongsTo('App\Models\User');
    //}

    public function sentTo()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function sentBy()
    {
        return $this->belongsTo(User::class, 'assigned_by_user_id');
    }
}
