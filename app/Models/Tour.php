<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours';
    protected $fillable = [
        'type_tour_id', 'user_id', 'district', 'title', 'description', 'address', 'cover_image', 'map_location', 'duration', 'unit_duration'
    ];
}
