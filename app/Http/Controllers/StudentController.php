<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Batch;
use App\Models\MarkAttendance;
use App\Models\TimeTable;

use Session;

class StudentController extends Controller
{
    public function register(){
        if(session()->has('student_email')){
            
            redirect()->route('student.dashboard');
        }
        $batch=Batch::get();
        return view('student.auth.studenRegister')->with('batches',$batch);
    }
    public function login(){
        if(session()->has('student_email')){
            redirect()->route('student.dashboard');
        }
        return view('student.auth.login');
    }

    public function studentRegister(Request $request){
        $student=$request->validate([
            'name'=>'required|string|max:250',
            'admission-number'=>'required|max:10',
            'email'=>'required|email|unique:students|max:250',
            'mobile-number'=>'required|digits:10',
            'gender'=>'required|string',
            'batch-id'=>'required',
            // 'branch-name'=>'required|string',
            // 'course-name'=>'required|string',
            // 'semester'=>'required',
            'start-date'=>'required',
        ]);
        $pass=IdGenerator::generate(['table' => 'students','field'=>'password', 'length' => 6, 'prefix' =>date('y')]);
        $student=new Student();
        $student->name=$request['name'];
        $student->admission_number=$request['admission-number'];
        $student->email=$request['email'];
        $student->mobile_number=$request['mobile-number'];
        $student->gender=$request['gender'];

        $student->batch_id=$request['batch-id'];
        // $student->branch_name=$request['branch-name'];
        // $student->course_name=$request['course-name'];
        // $student->semester=$request['semester'];
        $student->start_date=$request['start-date'];
        $student->password=Hash::make($pass);
    
        $res=$student->save();
        if($res){
            return redirect()->route('student.login')->with('msg','Save data successfully!!');
        }
        return back();
    }

    public function studentLogin(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        //dd(Auth::guard('student')->attempt($credentials));

        $student= Student::where('email',$request->email)->first();
        //dd($student);
        if(is_null($student)){
            return redirect()->route('student.login')->with('error',"Your are not valid student!");
        }
        
        if(Hash::check($request->password, $student->password)){
            session(['student_email'=>$request->email]);
            session(['student_id'=>$student->id]);
            return redirect()->route('student.dashboard')->with('msg',"You are login successfully!!");
        }
        return redirect()->route('student.login')->with('error',"Your email and password incorrect! Try again");
    }
    public function studentDashboard(){
        if(session()->has('student_email')){
            $student=Student::with('batch')->find(session()->get('student_id'));
            //$attendance=Student::with('markattendance')->where('id',session()->get('student_id'))->get();
            $attendance=MarkAttendance::where('student_id',session()->get('student_id'))->get();
            //$attendance=MarkAttendance::with('timetable')->where('student_id',session()->get('student_id'))->get();
            // $attendance=Timetable::withWhereHas('attendance',function($query){
            //     $query->where('student_id',session()->get('student_id'));
            // })->get();
            //dd($attendance);
            return view('student.auth.studentDashboard')->with(['student'=>$student, 'attendances'=>$attendance]);
        }
        return redirect()->route('student.login');
    }

    public function studentLogout(){
        // if(session()->has('student_email')){
        //     return redirect()->route('student.dashboard');
        // }
        Session::flush();
        session()->flush('student_email');
        return redirect()->route('student.login');
    }
    public function scan(){
        if(session()->has('student_email')){
            return view('student.auth.scan');
        }
        return redirect()->route('student.login');
    }
}
