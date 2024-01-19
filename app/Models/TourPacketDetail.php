<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPacketDetail extends Model
{
    use HasFactory;
    protected $table = 'detail_packet_destinations';
    protected $fillable = [
        'packet_destination_id', 'tour_id'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function packet()
    {
        return $this->belongsTo(TourPacket::class, 'packet_destination_id', 'id');
    }

    
}
