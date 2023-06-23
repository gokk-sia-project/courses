<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\Subjects;
use DB;

Class SubjectController extends Controller {

use ApiResponser;
private $request;
public function __construct(Request $request){
$this->request = $request;
}

    public function getSubjects(){ //LISTUSER - list all user data
        $subject = DB::connection('mysql')
        ->select("Select * from subjects");
        return $this->successResponse($subject);
    }


    public function getSubjectID($id){ //GETID - get using with id
        $subject = Subjects::where('subject_id', $id)->first();
        if($subject){
            return $this->successResponse($subject);
        }
        {
            return $this->errorResponse('Course ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }


    public function addSubject(Request $request ){ //ADDUSER - create one user data
        $rules = [
            'subject_id' => 'numeric|min:1|not_in:0',
            'subject_name' => 'required|max:30',
        ];
        $this->validate($request,$rules);
        $subjects = Subjects::create($request->all());
        return $this->successResponse($subjects, Response::HTTP_CREATED);
    }


    public function updateSubject(Request $request,$id){ //UPDATEUSER - updates the user
        $rules = [
            'subject_id' => 'numeric|min:1|not_in:0',
            'subject_name' => 'required|max:30',
        ];
        $this->validate($request, $rules);
        $subjects = Subjects::findOrFail($id);
        $subjects->fill($request->all());
        
        if ($subjects->isClean()) {
            return $this->errorResponse('Must change subject name', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $subjects->save();
        return $subjects;
    }


    public function deleteSubject($id){ //DELETUSER - delete existing user
        $subjects = Subjects::where('subject_id', $id)->delete();
        if($subjects){
            return $this->successResponse($subjects);
        }
        {
            return $this->errorResponse('Subject ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }

}