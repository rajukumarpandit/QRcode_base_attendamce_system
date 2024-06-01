<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function getAllBranch($id){
        $branches=Branch::where('session_id',$id)->get();
        return view('branches.allbranch')->with('branches',$branches);
    }   
}
