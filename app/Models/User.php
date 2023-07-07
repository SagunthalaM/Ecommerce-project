<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//here use it must
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public function isAdmin()
{
    // Add your logic here to determine if the user is an admin or not
    // For example, you might have an 'is_admin' column in your 'users' table
    return $this->is_admin === true;
}
}
