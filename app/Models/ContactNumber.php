<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactNumber extends Model
{
    use HasFactory;
    protected $tables = 'contact_numbers';
    protected $fillable = ['contact_id', 'number'];
}
