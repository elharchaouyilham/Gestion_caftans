<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_reservation',
        'date_retour',
        'status',
        'product_id',
        'user_id',
        'event_type',
        'client_name',
        'client_phone',
        'client_email',
        'client_city',
        'special_requests',
        'total_amount'
    ];

    protected $casts = [
        'date_reservation' => 'datetime:Y-m-d',
        'date_retour' => 'datetime:Y-m-d',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_reservation')
            ->select('products.*');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Calculate rental duration in days
     */
    public function getDurationInDays()
    {
        $dateRes = is_string($this->date_reservation) ? \Carbon\Carbon::parse($this->date_reservation) : $this->date_reservation;
        $dateRetour = is_string($this->date_retour) ? \Carbon\Carbon::parse($this->date_retour) : $this->date_retour;
        return $dateRes->diffInDays($dateRetour);
    }

    /**
     * Calculate total amount for all products
     */
    public function calculateTotal()
    {
        $duration = $this->getDurationInDays();
        $total = $this->products()->sum('prix') * $duration;
        $this->total_amount = $total;
        return $total;
    }

    /**
     * Scope: filter by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope: filter by date range
     */
    public function scopeByDateRange($query, $from, $to)
    {
        return $query->whereBetween('date_reservation', [$from, $to]);
    }
}
