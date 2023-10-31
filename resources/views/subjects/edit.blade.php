@extends('layouts.app')
@section('title', 'Edit Subject')
@section('content')
<div class="container">
    <h2>Edit Subject</h2>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $subject->name) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
