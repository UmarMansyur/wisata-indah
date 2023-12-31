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

    public function typeTour()
    {
        return $this->belongsTo(TypeTour::class, 'type_tour_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function costTour()
    {
        return $this->hasMany(CostTour::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function detailTransaction()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
