<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkAttendance extends Model
{
    use HasFactory;
    protected $fillable=['student_id','time_table_id'];
    
    public function timetable(){
        return $this->belongsTo(TimeTable::class,'time_table_id','id');
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
