<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class ApiRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms, 200);
    }

    public function show(String $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        return response()->json($room, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);

        $room = Room::create($data);

        return response()->json($room, 201);
    }

    public function update(Request $request, String $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        $data = $request->validate([
            'name' => 'required|max:255',
        ]);

        $room->update($data);

        return response()->json($room, 200);
    }

    public function destroy(String $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        $room->delete();

        return response()->json(['message' => 'Room deleted'], 200);
    }
}
