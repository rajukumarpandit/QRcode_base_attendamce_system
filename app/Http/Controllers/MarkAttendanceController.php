<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\MarkAttendance;
use datetime;


class MarkAttendanceController extends Controller
{
    public function markAttendance(Request $request){
        // $mark= new MarkAttendance();
        // $mark->student_id=session()->get('student_id');
        // $mark->time_table_id=$request['id'];
        // $res=$mark->save();
        $res=markAttendance::firstOrCreate(
            ['student_id'=>session()->get('student_id'),
                'time_table_id'=>$request['id']
            ],
            [
                'student_id'=>session()->get('student_id'),
                'time_table_id'=>$request['id']
            ]
        );
        if($res){
            return redirect()->route('student.dashboard')->with('msg','Mark attendence successfully!!');
        }
        return back();
    }
}
