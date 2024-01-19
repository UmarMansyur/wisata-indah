<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours';
    protected $fillable = [
        'district', 'title', 'description', 'address', 'cover_image', 'map_location'
    ];

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

    public function detailTour()
    {
        return $this->hasMany(DetailTour::class);
    }
}
