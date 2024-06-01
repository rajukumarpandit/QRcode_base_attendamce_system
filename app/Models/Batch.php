<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    public function student(){
        return $this->hasMany(Student::class);
    }
    public function subject(){
        return $this->hasMany(Subject::class);
    }
}
