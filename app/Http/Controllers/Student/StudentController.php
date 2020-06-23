<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;

class StudentController extends Controller
{
    public function student (){

        return response()->json(StudentModel::get(), 200);

    }
}
