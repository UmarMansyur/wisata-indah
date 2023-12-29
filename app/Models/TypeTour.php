<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTour extends Model
{
    use HasFactory;
    protected $table = 'type_tours';
    protected $fillable = [
        'name'
    ];
}
