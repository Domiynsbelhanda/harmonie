<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;

class StudentProfile extends Model
{
    protected $fillable = [
        'nom', 'postnom', 'prenom', 'sexe', 'date_naissance', 'lieu_naissance', 'nationalite',
        'matricule', 'classe_id', 'academic_year', 'statut',
        'adresse', 'telephone', 'email',
        'nom_pere', 'tel_pere', 'nom_mere', 'tel_mere', 'tuteur',
        'photo', 'observations',
        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }
}
