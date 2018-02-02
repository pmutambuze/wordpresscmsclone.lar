<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  public function tags() {
	  return $this->belongsToMany(Tag::class);
	}

  public function scopePublished($query) {
  	return $query->where("published_at", "<=", Carbon::now());
  }

}
