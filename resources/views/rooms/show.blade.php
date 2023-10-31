@extends('layouts.app')
@section('title', 'Room Details')
@section('content')
    <div class="container">
        <h2>Room Details</h2>

        <p><strong>ID:</strong> {{ $room->id }}</p>
        <p><strong>Name:</strong> {{ $room->name }}</p>

        <div class="mt-4">
            <a href="{{ route('rooms.index') }}" class="btn btn-primary">Back to Rooms</a>
        </div>
    </div>
    
@endsection
