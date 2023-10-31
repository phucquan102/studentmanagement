@extends('layouts.app')
@section('title', 'Subjects')
@section('content')
    <div class="container mt-4">
        <h2>Subjects</h2>

        <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Create Subject</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No subjects found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
