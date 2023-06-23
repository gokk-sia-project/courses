<?php
namespace App\Http\Controllers;
use App\Models\TeacherCourseList;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;

Class TeacherCourseListController extends Controller {

    use ApiResponser;
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function index(){
        $courselist = TeacherCourseList::all();
        return $this->successResponse($courselist);
    }
    
    public function getCourseAssigned($id){
        $courselist = TeacherCourseList::where('course_id', $id)->get();
        return $this->successResponse($courselist);
    }
}