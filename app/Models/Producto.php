<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'nombre',
        'precio',
        'stock',
        'create_at',
        'update_at'
    ];
}
