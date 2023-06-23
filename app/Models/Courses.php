<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Courses extends Model{

    protected $table = 'courses';
    protected $fillable = [
        'coursename'
    ];

    public $timestamps = false;
    protected $primaryKey = 'course_id';
}