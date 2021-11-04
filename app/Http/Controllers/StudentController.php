<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('students.list',[
            'students' => Student::paginate(30),
        ]);
    }
}
