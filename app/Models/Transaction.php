<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $tables = 'transactions';
    protected $fillable = ['user_id', 'total_price', 'status', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detailTransaction()
    {
        return $this->hasMany(DetailTransaction::class, 'transaction_id', 'id');
    }
}
