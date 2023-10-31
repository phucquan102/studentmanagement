<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects|max:255',
        ]);

        Subject::create($request->only('name'));

        return redirect()->route('subjects.index')->with('success', 'Subject đã được tạo thành công!');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|unique:subjects|max:255',
        ]);

        $subject->update($request->only('name'));

        return redirect()->route('subjects.index')->with('success', 'Subject đã được cập nhật thành công!');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject đã được xóa thành công!');
    }
}
