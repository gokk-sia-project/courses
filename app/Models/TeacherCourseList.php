<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class TeacherCourseList extends Model{

    protected $table = 'get_teachers_in_course';

    public $timestamps = false;
    protected $primaryKey = 'course_id';

}