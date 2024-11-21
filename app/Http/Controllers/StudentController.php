<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{

    function list() {
        return student::all();
    }
  
    
    function addstudent(Request $request) {
        return $request->input();
    }
    // // // //   //

   
    
    // function addstudent(Request $request) {
       
    
        
    //         // Create new student instance and fill data
    //         $Student = new student();
    //         $Student->name = $request->name;
    //         $Student->city = $request->city;
    
    //         // Save the student record
    //         if ($Student->save()) {
    //             return"done" ;
    //         } else {
    //             return "fail";
    //         }
       
    // }
    
//      function addstudent(Request $request) {
        
//     //     // return "success";
//         $student = new student();

//         $student->name = $request->name;
        
//         $student->city = $request->city;

//         // Save student to database and return a message
//         if ($student->save()) {
//             return "Student added";
//         } else {
//             return "Operation failed";
//         }
        
// }

function updateStudent(Request $request) {
    $student = student::find($request->id);
    $student->name = $request->name;
    $student->city = $request->city;
   

    if ($student->save()) {
        return ["result" => "student updated"];
    } else {
        return ["result" => "student not updated"];
    }
}
}