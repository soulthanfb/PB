<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        //mendapatkan semua data siswa
        $students = Student::all();

        $data = [
            "message"=> "Get all resource",
            "data"=> $students
        ];

        //kirim data(json) dan response code
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $input = [
            'nama'=>$request->nama,
            'nim'=>$request->nim,
            'email'=>$request->email,
            'jurusan'=>$request->jurusan
        ];

        $students = Student::create($input);
        $data =[
            'message'=>'student is created succesfully',
            'data'=>$students,
        ];
        return response()->json($data, 201);
    }

    //edit data siswa
    public function update(Request $request, $id){
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->nama = $request->input('nama', $student->nama);
        $student->nim = $request->input('nim', $student->nim);
        $student->email = $request->input('email', $student->email);
        $student->jurusan = $request->input('jurusan', $student->jurusan);

        $student->save();

        $data = [
            'message' => 'Student is updated successfully',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }

    //perintah untuk menghapus data siswa
    public function destroy($id){
    $student = Student::find($id);

    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    $student->delete();

    return response()->json(['message' => 'Student is deleted successfully'], 200);
    }
}
