<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Room;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $rooms = Room::all();
        $subjects = Subject::all();
        return view('students.create', compact('rooms', 'subjects'));
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());

        // Lưu hình ảnh
        if ($request->hasFile('image')) {
            $student->image = $request->image->store('images', 'public');
            $student->save();
        }

        $student->subjects()->attach($request->subjects);
        return redirect()->route('students.index');
    }

    public function show(string $id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::find($id);
        $rooms = Room::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'rooms', 'subjects'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        $student->subjects()->sync($request->subjects);
        return redirect()->route('students.index');
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }

    public function search(Request $request)
    {
        $students = Student::where('name', 'like', '%' . $request->search . '%')->get();
        return view('students.index', compact('students'));
    }
}
