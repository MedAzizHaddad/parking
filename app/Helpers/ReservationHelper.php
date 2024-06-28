<?php

namespace App\Helpers;

class ReservationHelper
{
    const PRIX_HEURE = 10;

    public static function calculateMontant($heures)
    {
        return self::PRIX_HEURE * $heures;
    }
}
