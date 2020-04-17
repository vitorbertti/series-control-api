<?php

namespace App;

use App\Episode;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
   public $timestamps = false;
   protected $fillable = ['name'];
   protected $perPage = 10;

   public function episodes()
   {
      return $this->hasMany(Episode::class);
   }
}
