<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;
use datetime;
class TimetableController extends Controller
{
    public function timeTable(){
        $admin=User::find(Auth::User()->id);
        $teacher=Teacher::get();
        $subject=Subject::get();
        $batch=Batch::get();
        return view('timetable.timetables')->with(['admins'=>$admin,'teachers'=>$teacher, 'subjects'=>$subject, 'batches'=>$batch]);
    }
    public function timeTables(Request $request){
        $request->validate([
            'admin-id'=>'required',
            'teacher-id'=>'required',
            'subject-id'=>'required',
            'batch-id'=>'required',
            'room-number'=>'required',
            'date'=>'required',
            'start-time'=>'required',
            'end-time'=>'required',
        ]);
        $timetable=new TimeTable();
        $timetable->admin_id=$request['admin-id'];
        $timetable->teacher_id=$request['teacher-id'];
        $timetable->subject_id=$request['subject-id'];
        $timetable->batch_id=$request['batch-id'];
        $timetable->room_number=$request['room-number'];
        $timetable->date=$request['date'];
        $timetable->start_time=$request['start-time'];
        $timetable->end_time=$request['end-time'];
        $res=$timetable->save();
        if($res){
            return redirect()->route('admin.dashboard')->with('msg','Data save successfully!!');
        }
        return back();
    }
    public function getAllTimetable(){
        $timetables=TimeTable::get();
        //dd($timetables);
        return view('timetable.getalltimetable')->with('timetables',$timetables);
    }
}
