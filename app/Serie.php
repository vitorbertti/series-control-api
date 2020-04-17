<?php

namespace App;

use App\Episode;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
   public $timestamps = false;
   protected $fillable = ['name'];
   protected $perPage = 10;
   protected $appends = ['links'];

   public function episodes()
   {
      return $this->hasMany(Episode::class);
   }

   public function getLinksAttribute($links): array
   {
      return [
         'self' => '/api/series/' . $this->id,
         'episodes' => '/api/series/' . $this->id . '/episodes/'
      ];
   }
}
