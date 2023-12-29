<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostTour extends Model
{
    use HasFactory;
    protected $tables = 'cost_tours';
    protected $fillable = ['tour_id', 'passenger_id', 'price'];
}
