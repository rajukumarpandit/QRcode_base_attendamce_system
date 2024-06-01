<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Branch;

class SubjectController extends Controller
{
    public function createSubject(){
        $branches=Branch::get();
        return view('subject.subject')->with('branches',$branches);
    }
    public function storeSubject(Request $request){
        $request->validate([
            'subject-code'=>'required|alpha_num',
            'subject-name'=>'required|string',
        ]);
        $subject= new Subject();
        $subject->branch_id=$request['branch_id'];
        $subject->subject_code=$request['subject-code'];
        $subject->subject_name=$request['subject-name'];

        $res=$subject->save();
        if($res){
            return redirect()->route('admin.dashboard');
        }
        return back();
    }
    public function getAllSubject(){
        $subject=Subject::get();
        //dd($subject);
        return view('subject.getallsubject')->with('subjects',$subject);;
    }
}
