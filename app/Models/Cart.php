<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $tables = 'carts';
    protected $fillable = ['user_id', 'tour_id', 'passenger_id', 'amount', 'price'];
    
}
