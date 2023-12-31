<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $tables = 'passengers';
    protected $fillable = ['name'];

    public function costTour()
    {
        return $this->hasMany(CostTour::class);
    }

    public function detailTransaction()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
