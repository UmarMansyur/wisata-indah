<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTour extends Model
{
    use HasFactory;
    protected $table = 'detail_tours';
    protected $fillable = [
        'tour_id', 'type_tour_id'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function typeTour()
    {
        return $this->belongsTo(TypeTour::class);
    }
}
