@extends('layouts.app')
@section('title', 'Students')
@section('content')

<div class="container mt-4">
    <h2>Student List</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Room</th>
                    <th scope="col">Subjects</th>
                    <th scope="col">Image</th>
                    <th scope="col">Note</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a>
                        </td>
                        <td>{{ $student->student_id }}</td>
                        <td>
                            @if ($student->room)
                                {{ $student->room->name }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @foreach ($student->subjects as $subject)
                                <span class="badge bg-primary">{{ $subject->name }}</span>
                            @endforeach
                            @if ($student->subjects->isEmpty())
                                No Subjects
                            @endif
                        </td>
                        <td>
                            @if ($student->image)
                            <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image" style="max-width: 100px;" class="img-fluid">

                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            {{ $student->note ?: 'N/A' }}
                        </td>
                    </tr>
                @endforeach
                @if ($students->isEmpty())
                    <tr>
                        <td colspan="7">No students found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
