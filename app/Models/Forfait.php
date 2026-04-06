<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forfait extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'quantite',
        'prix',
        'url',
        'user_id',
        'duration',
        'inclusions'
    ];

    protected $casts = [
        'inclusions' => 'array'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(ForfaitReservation::class, 'forfait_id');
    }

    /**
     * Check if forfait is available on given dates
     */
    public function isAvailable($fromDate, $toDate)
    {
        return !$this->reservations()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($fromDate, $toDate) {
                $query->whereBetween('date_reservation', [$fromDate, $toDate])
                    ->orWhereBetween('date_retour', [$fromDate, $toDate])
                    ->orWhere(function ($q) use ($fromDate, $toDate) {
                        $q->where('date_reservation', '<=', $fromDate)
                            ->where('date_retour', '>=', $toDate);
                    });
            })
            ->exists();
    }
}
