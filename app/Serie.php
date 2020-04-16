<?php

namespace App;

use App\Episode;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
   public $timestamps = false;
   protected $fillable = ['name'];

   public function episodes()
   {
      return $this->hasMany(Episode::class);
   }
}
