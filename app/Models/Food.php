<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable=['size','ToppingID','NoodleTypeID','CartID','unitPrice','quantity','totalPrice'];





}
