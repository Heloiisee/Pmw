<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veille extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'source',
        'type',
        'categorie',
    ];
    
}
