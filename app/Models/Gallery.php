<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Gallery extends Model
{
    use HasFactory;
    protected $tables = 'galleries';
    protected $fillable = ['tour_id', 'url'];
    
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
