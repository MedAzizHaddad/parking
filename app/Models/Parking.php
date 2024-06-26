<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'details', 'capacite', 'nb_res'];

    protected $attributes = [
        'nb_res' => 0,
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
