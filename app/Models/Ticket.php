<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function swap() {
        return $this->hasMany(Swap::class);
    }

    protected $guarded = [];
}
