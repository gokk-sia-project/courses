<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});

// COURSE CONTROLLER ROUTES

$router->get('/getcourses',['uses' => 'CourseController@getCourses']); //getCourses - SHOW ALL COURSES

$router->get('/getcourse/{id}', 'CourseController@getCourseID'); //getCourseID - GET COURSE BY ID

$router->post('/addcourse', 'CourseController@addCourse'); //addCourse - CREATE NEW COURSE

$router->put('/updatecourse/{id}', 'CourseController@updateCourse');  //updateCourse - UPDATE COURSE USING PUT

$router->delete('/deletecourse/{id}', 'CourseController@deleteCourse'); //deleteCourse - DELETE COURSE


// SUBJECT CONTROLLER ROUTES

$router->get('/getsubjects',['uses' => 'SubjectController@getSubjects']); //getSubjects - SHOW ALL SUBJECTS

$router->get('/getsubject/{id}', 'SubjectController@getSubjectID'); //getSubjectID - GET SUBJECT BY ID

$router->post('/addsubject', 'SubjectController@addSubject'); //addSubject - CREATE NEW SUBJECT

$router->put('/updatesubject/{id}', 'SubjectController@updateSubject');  //updateSubject - UPDATE COURSE USING PUT

$router->delete('/deletesubject/{id}', 'SubjectController@deleteSubject'); //deleteSubject - DELETE COURSE


// STUDENT COURSE CONTROLLER ROUTES

$router->get('/courseenrollees','StudentCourseListController@index'); //index - GET ALL LIST OF ENROLLEES'

$router->get('/courseenrollee/{id}','StudentCourseListController@getCourseEnrolled'); //getCourseEnrolled - GET ENROLLED STUDENT BY ID


// TEACHER COURSE CONTROLLER ROUTES

$router->get('/courseassignees','TeacherCourseListController@index'); //index - GET ALL LIST OF ASSIGNEES'

$router->get('/courseassignee/{id}','TeacherCourseListController@getCourseAssigned'); //getCourseAssigned - GET ASSIGNED TEACHER BY ID