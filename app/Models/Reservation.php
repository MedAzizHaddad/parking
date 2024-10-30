<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'heures', 'montant', 'parking_id', 'statut', 'user_id'];

    const STATUS_EN_ATTENTE = 'en_attente';
    const STATUS_APPROUVEE = 'approuvée';
    const STATUS_REFUSEE = 'refusée';
    const STATUS_ANNULEE = 'annulée';

    public static function getStatuses()
    {
        return [
            self::STATUS_EN_ATTENTE,
            self::STATUS_APPROUVEE,
            self::STATUS_REFUSEE,
            self::STATUS_ANNULEE,
        ];
    }
    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
