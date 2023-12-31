<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $tables = 'detail_transactions';
    protected $fillable = ['transaction_id', 'tour_id', 'passenger_id', 'amount', 'price'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id', 'id');
    }
}
