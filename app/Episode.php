<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

   public $timestamps = false;
   protected $fillable = ['season', 'number', 'watched', 'serie_id'];

   public function serie()
   {
      return $this->belongsTo(Serie::class);
   }

   public function getWatchedAttribute($watched): bool
   {
      return $watched;
   }
}
