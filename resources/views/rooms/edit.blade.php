@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Room</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rooms.update', $room->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Room Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
                                </div>
                            </div>

                            <!-- Add other room-specific fields here -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
