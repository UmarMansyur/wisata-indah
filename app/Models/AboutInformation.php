<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutInformation extends Model
{
    use HasFactory;
    protected $tables = 'about_informations';
    protected $fillable = ['register_amount', 'member_amount', 'tour_collaboration_amount', 'guest_amount', 'url'];
}
