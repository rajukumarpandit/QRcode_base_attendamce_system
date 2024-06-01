<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    //use HasFactory;
    public $table='students';
    protected $fillable=[
    'name',
    'admission_number',
    'email',
    'mobile-number',
    'start-date',
    'password'
    ];
    protected $hidden = ['password','remember_token'];
    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function markattendance(){
        return $this->hasMany(MarkAttendance::class);
    }
    // public function markattendances(){
    //     return $this->hasMany(MarkAttendance::class);
    // }
}
