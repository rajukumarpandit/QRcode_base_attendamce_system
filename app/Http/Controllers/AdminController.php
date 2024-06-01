<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Teacher;
use App\Models\TimeTable;
use App\Models\Batch;
use App\Models\Subject;
use Session;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public $data=array();
    public function register(){
        if(Auth::check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.adminRegister');
    }
    public function adminRegister(Request $request){
        $request->validate([
            'name'=>'required|min:2|max:250',
            'email'=>'required|email|unique:admins|max:250',
            'role'=>'required',
            'password'=>'required|confirmed|min:4',
            'password_confirmation'=>'required'
        ]);
        $admin=new User();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->role=$request->role;
        $admin->password=Hash::make($request->password);
        $res=$admin->save();
        if($res){
            return view('admin.auth.login')->with('msg','Data save successfully!');
        } 
        return back()->with('msg','Data save successfully!');
    }
    
    public function login(){
        if(Auth::check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request){
        $credentials=$request->validate(
            [
                'email'=>'required|email',
                'role'=>'required',
                'password'=>'required'
            ]
        );
        //if i checked user authenticate or not
        if(Auth::attempt($credentials)){
            if(Auth::User()->role=='admin'){  //if I checked the user status 2
               // return redirect('/v1/admin/dashboard')->with('msg',"You are login successfully!!");
                return redirect()->route('admin.dashboard')->with('msg',"You are login successfully!!");
            }
        }
        return redirect()->route('admin.login')->with('error',"Your email and password incorrect! Try again");
    }
    public function adminLogout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function adminDashboard(){
        if(Auth::check()){
            $teachers=Teacher::get()->count();
            $students=Student::get()->count();
            $timetables=TimeTable::get()->count();
            $batches=Batch::get()->count();
            //dd($timetables);
            return view('admin.auth.adminDashboard')->with(['teachers'=>$teachers, 'students'=>$students, 'timetables'=>$timetables, 'batches'=>$batches]);
        }
        return redirect()->route('admin.login');
    }
    public function getAllTeacher(){
        $teachers=Teacher::get();
        return view('admin.auth.getallteacher')->with('teachers',$teachers);
    }
    public function getAllStudent(){
        $students=Student::get();
        return view('admin.auth.getallstudent')->with('students',$students);
    }
    
    
}
