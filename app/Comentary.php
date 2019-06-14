<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentary extends Model
{
    protected $fillable = [
        'ubication_id',
        'description',
        'payment',
        'email'
      ];
}
