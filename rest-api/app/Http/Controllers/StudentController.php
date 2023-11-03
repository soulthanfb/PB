<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        //mendapatkan semua data siswa
        $students = Student::all();

        if ($students->isEmpty()) {
            $data = [
                "message"=> "Resource is empety"
            ];
            return response()->json($data, 204);
        }

        $data = [
            "message"=> "Get all resource",
            "data"=> $students
        ];

        //kirim data(json) dan response code
        return response()->json($data, 200);
    }

    public function show($id){
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $data =[
            'message'=>'Show detail resource',
            'data'=>$student
        ];
        return response()->json($data, 200);


    }
        
    

    //Store untuk menambahkan data siswa
    public function store(Request $request)
    {
        //validasi data request
        $request->validate( [
            "nama"=>"required",          
            "nim"=>"required",         
            "email"=>"required|email",           
            "jurusan"=>"required"
        ]);
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

        $student->update([
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request-> nim ?? $student->nim,
            'email' => $request-> email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ]);
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
