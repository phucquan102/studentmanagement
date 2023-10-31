@extends('layouts.app')
@section('title', 'Rooms')
@section('content')
    <div class="container mt-4">
        <h2>Rooms</h2>

        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Create Room</a>

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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->name }}</td>
                            <td>
                                <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No rooms found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    </div>
@endsection
