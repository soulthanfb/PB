<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Student extends Model
{
    // membuat fungsi getStudent di model Student
    public function getStudent(){
        //menggunakan query sql untuk mengambil data
        $students = DB::select('select * from students');
        return $students;
    }

    public function index(){
        $students = Student::getAllStudents();
        echo $students;
    }

    protected $fillable = ['nama', 'nim', 'email', 'jurusan'];

    use HasFactory;
}

