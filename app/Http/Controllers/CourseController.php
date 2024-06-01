<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function getAllCourse(){
        $courses=Course::all();
        return view('course.allcourse')->with('courses',$courses);
    }
}
