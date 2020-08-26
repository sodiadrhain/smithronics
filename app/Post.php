<?php

namespace site;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $guarded = ['id'];
  public function categories(){

    return $this->belongsToMany('site\Category')->withTimestamps();

  }

  public function comments(){
    return $this->morphMany('site\Comment', 'post');
  }

}
