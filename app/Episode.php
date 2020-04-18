<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

   public $timestamps = false;
   protected $fillable = ['season', 'number', 'watched', 'serie_id'];
   protected $appends = ['links'];

   public function serie()
   {
      return $this->belongsTo(Serie::class);
   }

   public function getWatchedAttribute($watched): bool
   {
      return $watched;
   }

   public function getLinksAttribute(): array
   {
      return [
         'self' => '/api/episodes/' . $this->id,
         'serie' => '/api/series/' . $this->serie_id
      ];
   }
}
