<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class ApiStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

    public function show(String $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student, 200);
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function update(Request $request, String $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->update($request->all());
        return response()->json($student, 200);
    }

    public function destroy(String $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

      
        $student->delete();
        return response()->json(['message' => 'Student deleted'], 200);
    }
}
