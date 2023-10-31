@extends('layouts.app')
@section('title', 'Subject Details')
@section('content')
    <div class="container">
        <h2>Subject Details</h2>

        <div class="mb-3">
            <strong>ID:</strong> {{ $subject->id }}
        </div>

        <div class="mb-3">
            <strong>Name:</strong> {{ $subject->name }}
        </div>

        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
