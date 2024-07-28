<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'ville', 'commune', 'ad_complet',
    ];
}
