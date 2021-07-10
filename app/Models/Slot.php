<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'hour',
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
