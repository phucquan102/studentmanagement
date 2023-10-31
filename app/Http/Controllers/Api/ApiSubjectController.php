<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class ApiSubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects, 200);
    }

    public function show(String $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        return response()->json($subject, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:subjects|max:255',
        ]);

        $subject = Subject::create($data);

        return response()->json($subject, 201);
    }

    public function update(Request $request, String $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $data = $request->validate([
            'name' => 'required|unique:subjects|max:255',
        ]);

        $subject->update($data);

        return response()->json($subject, 200);
    }

    public function destroy(String $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $subject->delete();

        return response()->json(['message' => 'Subject deleted'], 200);
    }
}
