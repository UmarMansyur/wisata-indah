<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPacketGalleries extends Model
{
    use HasFactory;
    protected $table = 'packet_destination_galleries';
    protected $fillable = [
        'packet_destination_id', 'image'
    ];

    public function galleryPacket()
    {
        return $this->belongsTo(TourPacket::class, 'packet_destination_id', 'id');
    }
}
