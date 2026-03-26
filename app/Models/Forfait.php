<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Forfait extends Model
{
    use HasFactory; 
    protected $fillable = [
        'nom',
        'quantite',
        'prix',
        'url',
        'user_id'
    ];
    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
