<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\Courses;
use DB;

Class CourseController extends Controller {

use ApiResponser;
private $request;
public function __construct(Request $request){
$this->request = $request;
}

    public function getCourses(){ //LISTUSER - list all user data
        $course = DB::connection('mysql')
        ->select("Select * from courses");
        return $this->successResponse($course);
    }


    public function getCourseID($id){ //GETID - get using with id
        $course = Courses::where('course_id', $id)->first();
        if($course){
            return $this->successResponse($course);
        }
        {
            return $this->errorResponse('Course ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }


    public function addCourse(Request $request ){ //ADDUSER - create one user data
        $rules = [
            'course_id' => 'numeric|min:1|not_in:0',
            'course_name' => 'required|max:30',
        ];
        $this->validate($request,$rules);
        $course = Courses::create($request->all());
        return $this->successResponse($course, Response::HTTP_CREATED);
    }


    public function updateCourse(Request $request,$id){ //UPDATEUSER - updates the user
        $rules = [
            'course_id' => 'numeric|min:1|not_in:0',
            'course_name' => 'required|max:30',
        ];
        $this->validate($request, $rules);
        $course = Courses::findOrFail($id);
        $course->fill($request->all());
        
        if ($course->isClean()) {
            return $this->errorResponse('Must change Course name', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $course->save();
        return $course;
    }


    public function deleteCourse($id){ //DELETUSER - delete existing user
        $course = Courses::where('course_id', $id)->delete();
        if($course){
            return $this->successResponse($course);
        }
        {
            return $this->errorResponse('Course ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }

}