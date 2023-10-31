<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'student_id',
        'note',
        'room_id',
        'image',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
