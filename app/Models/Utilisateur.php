<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
            'nom',
            'prenom',
            'email',
            'age',
            'password',
            'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class, 'user_id');
    }




}
