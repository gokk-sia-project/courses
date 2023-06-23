<?php
namespace App\Http\Controllers;
use App\Models\StudentCourseList;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;

Class StudentCourseListController extends Controller {

    use ApiResponser;
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function index(){
        $courselist = StudentCourseList::all();
        return $this->successResponse($courselist);
    }
    
    public function getCourseEnrolled($id){
        $courselist = StudentCourseList::where('course_id', $id)->get();
        return $this->successResponse($courselist);
    }
}