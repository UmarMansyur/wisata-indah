<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailAddress extends Model
{
    use HasFactory;
    protected $tables = 'mail_addresses';
    protected $fillable = ['contact_id', 'email'];
}
