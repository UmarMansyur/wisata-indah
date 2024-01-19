<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPacket extends Model
{
    use HasFactory;
    protected $table = 'packet_destinations';
    protected $fillable = [
        'name', 'description', 'price', 'cover_image', 'min_person', 'price', 'is_madura', 'duration'
    ]; 

    public function detailTourPacket()
    {
        return $this->hasMany(TourPacketDetail::class, 'packet_destination_id', 'id');
    }

    public function galleryPacket()
    {
        return $this->hasMany(TourPacketGalleries::class, 'packet_destination_id', 'id');
    }
}
