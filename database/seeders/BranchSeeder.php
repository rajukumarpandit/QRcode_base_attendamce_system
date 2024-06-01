<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;
class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branch = new Branch();
        $data=[
            ['course_id'=>'1','branch_code'=>'CSEM1', 'branch_name'=>'School of Computer Science and Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB1', 'branch_name'=>'Computer Science and Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB2', 'branch_name'=>'Mechanical Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB3', 'branch_name'=>'Civil Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB4', 'branch_name'=>'Electronics and Computer Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB5', 'branch_name'=>'Engineering in Mechanical Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB6', 'branch_name'=>'Electronics and Electrical Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB7', 'branch_name'=>'Information Technology'],
            ['course_id'=>'2','branch_code'=>'CSEB8', 'branch_name'=>'Engineering in Computer Science and Engineering'],
            ['course_id'=>'2','branch_code'=>'CSEB9', 'branch_name'=>'Electrical Engineering'],
            ['course_id'=>'2','branch_code'=>'CSE10', 'branch_name'=>'Artificial Intelligence and Machine Learning'],
            ['course_id'=>'2','branch_code'=>'CSE11', 'branch_name'=>'Data Sciences'],
            ['course_id'=>'2','branch_code'=>'CSE12', 'branch_name'=>'Bachelor of Engineering in Data Sciences'],
            ['course_id'=>'2','branch_code'=>'CSE13', 'branch_name'=>'BioTechnology'],
            ['course_id'=>'2','branch_code'=>'CSE14', 'branch_name'=>'Chemical Engineering'],
            ['course_id'=>'2','branch_code'=>'CSE15', 'branch_name'=>'Bachelor in Engineering in Computer Engineering'],
            ['course_id'=>'2','branch_code'=>'CSE16', 'branch_name'=>'Bachelor of Engineering in Electronics and Telecom Engineering '],

        ];
        $branch->insert($data);
    }
}
