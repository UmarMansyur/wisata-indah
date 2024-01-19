<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $tables = 'detail_transactions';
    protected $fillable = [
        'transaction_id',
        'destination_packet_id',
        'qty',
        'price'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function destination_packet()
    {
        return $this->belongsTo(TourPacket::class, 'destination_packet_id', 'id');
    }

}
