<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'latitude',
        'longitude',
        'description'
      ];
}