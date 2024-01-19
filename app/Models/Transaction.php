<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $tables = 'transactions';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'departure_date',
        'status',
        'total_price'
    ];

    public function detailTransaction()
    {
        return $this->hasMany(DetailTransaction::class, 'transaction_id', 'id');
    }
}
