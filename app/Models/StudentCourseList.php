<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class StudentCourseList extends Model{

    protected $table = 'get_students_in_course';

    public $timestamps = false;
    protected $primaryKey = 'course_id';

}