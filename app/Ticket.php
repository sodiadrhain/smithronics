<?php

namespace site;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = ['name', 'email', 'subject', 'message', 'slug', 'status', 'user_id'];
  public function comments(){
    return $this->morphMany('site\Comment', 'post');
  }
}
