<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // protected $fillableで挿入するカラムを指定すると安全にcreateできる様になる。
  protected $fillable = ['title', 'body'];

  public function comments() {
    return $this->hasMany('App\Comment');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }
}
