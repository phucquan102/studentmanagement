@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
<div class="container">
    <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $student->name }}">
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="student_id" id="student_id" placeholder="" value="{{ $student->student_id }}">
        </div>
        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select class="form-select form-select-lg" name="room_id" id="room_id">
                @foreach ($rooms as $room)
                <option value="{{ $room->id }}" {{ $room->id == $student->room_id ? 'selected' : '' }}>
                    {{ $room->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="subjects" class="form-label">Subjects</label>
                <div>
                    @foreach ($subjects as $subject)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="subject_{{ $subject->id }}" name="subjects[]" value="{{ $subject->id }}" {{ in_array($subject->id, $student->subjects->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label" for="subject_{{ $subject->id }}">{{ $subject->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" name="note" id="note" rows="3">{{ $student->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
