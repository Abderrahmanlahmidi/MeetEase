<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'heure_debut',
        'heure_fin',
        'date_reservation',
        'user_id',
        'salle_id'
    ];

    public function utilisateur(){
      return $this -> belongsTo(Utilisateur::class, 'user_id');
    }

    public function salle(){
       return  $this -> belongsTo(Salle::class, 'salle_id');
    }

}
