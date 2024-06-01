<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Branch;

class BatchController extends Controller
{
    public function createBatch(){
        $course=Course::get();
        $branch=Branch::get();
        return view('batch.batch')->with(['courses'=>$course, 'branches'=>$branch]);
    }

    public function storeBatch(Request $request){
        $request->validate([
            'course-id'=>'required',
            'branch-id'=>'required',
            'session'=>'required',
            'section'=>'required',
            'semester'=>'required',
        ]);
        $batch = new Batch();
        $session=explode("-",$request['session']);
        $batch->batch_name=$request['course-id']."".$session[0]."".$request['section']."".$request['semester'];
        $batch->course_id=$request['course-id'];
        $batch->branch_id=$request['branch-id'];
        $batch->session=$request['session'];
        $batch->section=$request['section'];
        $batch->semester=$request['semester'];
        $res=$batch->save();
        if($res){
            return redirect()->route('admin.dashboard')->with('msg','Data save successfully!!');
        }
        return back();
    }
    public function getAllBatch(){
        $batches=Batch::get();
        //dd($batches);
        return view('batch.getallbatch')->with('batches',$batches);
    }
}
