@extends('layouts.app')
@section('title', 'Student Details')
@section('content')
<style>
    .card-title {
        font-size: 24px;
        font-weight: bold;
    }
    
    .card-text {
        font-size: 18px;
    }
    
    .subject-list {
        font-size: 16px;
    }
</style>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><strong>Name:</strong> {{ $student->name }}</h4>
            <h5 class="card-title"><strong>-Student ID:</strong> {{ $student->student_id }}</h5>
            <p class="card-text"><strong>Room:</strong> {{ optional($student->room)->name ?? 'N/A' }}</p>

            <!-- Hiển thị danh sách các môn học -->
            <p class="subject-list"><strong>Subjects:</strong>
                @if (count($student->subjects) > 0)
                    @foreach ($student->subjects as $subject)
                        {{ $subject->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                @else
                    N/A
                @endif
            </p>

            <p><strong>Image:</strong></p>
            @if ($student->image)
            <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image" style="max-width: 100px;" class="img-fluid">
            @endif
        </div>
    </div>
</div>
@endsection
