<?php

namespace site;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
protected $guarded = ['id'];
public function post(){
  return $this->morphTo();
}
}
