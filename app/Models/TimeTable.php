<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Subject;
// use App\Models\Batch;
class TimeTable extends Model
{
    use HasFactory;
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
    public function attendance(){
        return $this->hasMany(MarkAttendance::class,'time_table_id','id');
    }
}
