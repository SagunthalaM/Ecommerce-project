<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    //here we have to mention $table="cart" because table must create in the plural form only
    //so we have mention like this
    public $table = "cart";

}
