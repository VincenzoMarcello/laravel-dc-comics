<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    // # QUESTO SI METTE ALTRIMENTI IL FILL CERCA DI SALVARE ANCHE
    // # IL TOKEN DI SICUREZZA @csrf E NON AVENDO UNA COLONNA DA ERRORE
    protected $fillable = [
        "title",
        "description",
        "thumb",
        "price",
        "type",
        "series",
        "sale_date",
    ];
}
