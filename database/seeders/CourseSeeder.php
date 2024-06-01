<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course= new Course();
        $data=[
            ['course_code'=>'MCAN1','course_name'=>'MCA'],
            ['course_code'=>'BCAN1','course_name'=>'BCA'],
            ['course_code'=>'BTN1','course_name'=>'B.Tech'],
            ['course_code'=>'BBAN1','course_name'=>'BBA'],
            ['course_code'=>'MBAN1','course_name'=>'MBA'],
        ];
        $course->insert($data);
    }
}
