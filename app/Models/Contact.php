<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'telephone', 'adresse', 'photo_profile'];

}
