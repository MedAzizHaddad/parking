<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'heures', 'montant', 'parking_id'];

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
