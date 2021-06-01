<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
  protected $fillable = [
    'name',
    'price',
    'weight',
    'race',
    'slug',
  ];
}
