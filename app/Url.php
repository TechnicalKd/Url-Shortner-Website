<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;
use Carbon;

class Url extends Model
{
   protected $fillable = ['original_url','shorten_url'];


   ///creating the random shorten_url
   protected static function boot(){
   	parent::boot();
   	static::creating(function($url){ 
   		$url->shorten_url = 'kirandevkar'.Str::random(6);
   	 });
   }





}
