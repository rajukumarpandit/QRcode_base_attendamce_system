<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Teacher;
use App\Models\TimeTable;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use datetime;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Branch;
use App\Models\Batch;
use App\Models\Student;
use App\Models\MarkAttendance;

class TeacherController extends Controller
{
    public function register(){
        if(session()->has('email')){
            redirect()->route('teacher.dashboard');
        }
        $course = Course::all();
        $branch = Branch::all();
        return view('teacher.auth.register')->with(['courses'=>$course, 'branches'=>$branch]);
    }
    public function login(){
        if(session()->has('email')){
            redirect()->route('teacher.dashboard');
        }
        return view('teacher.auth.login');
    }

    public function teacherRegister(Request $request){
        $request->validate([
            'name'=>'required|string|max:250',
            'teacher-id'=>'required|alpha_num|max:10',
            'email'=>'required|email|unique:teachers,email|max:250',
            'mobile-number'=>'required|digits:10',
            'gender'=>'required|string',
            'course-name'=>'required|string',
            'branch-name'=>'required|string',
            'role'=>'required',
            'joining-date'=>'required',
        ]);
        //dd($request->all());
        $pass=IdGenerator::generate(['table' => 'students','field'=>'password', 'length' => 6, 'prefix' =>date('y')]);
        //dd($request->all());
        $teacher=new Teacher();
        $teacher->name=$request['name'];
        $teacher->teacher_id=$request['teacher-id'];
        $teacher->email=$request['email'];
        $teacher->mobile_number=$request['mobile-number'];
        $teacher->gender=$request['gender'];
        $teacher->course_name=$request['course-name'];
        $teacher->branch_name=$request['branch-name'];
        $teacher->role=$request['role'];
        $teacher->joing_date=$request['joining-date'];
        $teacher->Password=Hash::make($pass);
        $res=$teacher->save();
        if($res){
            return redirect()->route('teacher.login')->with('msg','Save data successfully!!');
        }
        return back();
    }

    public function teacherLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'role'=>'required',
            'password'=>'required'
        ]);
        //dd(Auth::guard('student')->attempt($credentials));
        //dd($request->all());
        $teacher=Teacher::where('email',$request->email)->first();
        
        if(is_null($teacher)){
            return redirect()->route('teacher.login')->with('error',"Your are not register!");
        }
        if(Hash::check($request->password, $teacher->password)){
            session(['email'=>$request->email]);
            return redirect()->route('teacher.dashboard')->with('msg',"You are login successfully!!");
        }
        return redirect()->route('teacher.login')->with('error',"Your email and password incorrect! Try again");
    }
    public function teacherDashboard(){
        if(session()->has('email')){
            $email=session()->get('email');
            $teacher= Teacher::where('email',$email)->first();
            $current = Carbon::now('Asia/Kolkata');
            //dd($current);
            $date=$current->format('Y-m-d');
            $time=$current->format('H:i');
            
            //dd($teacherdata->id);
            $timetable=TimeTable::with('subject','batch')->where('teacher_id',$teacher->id)->whereDate('date',$date)->get();

            //dd($timetable);
            return view('teacher.auth.teacherDashboard')->with(['timetables'=>$timetable]);
        }
        return redirect()->route('teacher.login');
    }

    public function logout(){
        // if(session()->has('email')){
        //     return redirect()->route('teacher.dashboard');
        // }
        session()->flush('email');
        return redirect()->route('teacher.login');
    }
    public function generateQRcode($id){
        return view('teacher.auth.qrcode')->with('timetable_id',$id);
    }
    public function viewAttendance(Request $request , $id){
        $batchid=TimeTable::where('id',$id)->value('batch_id');
        $students=Student::leftJoin('mark_attendances', 'students.id','=','mark_attendances.student_id')->where('batch_id',$batchid)->get();

        $absent=Student::doesntHave('markattendance')->where('batch_id', $batchid)->get();
        $present=Student::has('markattendance')->where('batch_id',$batchid)->get();
        return view('teacher.currenmarkattendance')->with(['present'=>$present, 'absent'=>$absent, 'students'=>$students]);
    }
    // public function searchAttendance(Request $request){
       
    //     $attendances=Student::where('batch_id', $request->batch)->get();
    //     return route('teacher.attendance')->with(['attendances'=>$attendances]);
    // }
}
