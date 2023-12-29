<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $tables = 'detail_transactions';
    protected $fillable = ['transaction_id', 'tour_id', 'passenger_id', 'amount', 'price'];
}
