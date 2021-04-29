<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
  protected $table = 'forms';

  public $fillable = [
    'member_id', 'name', 'phone', 'address', 'email'
  ];

  public function belongsMember()
  {
    return $this->belongsTo(Member::class, 'member_id', 'id');
  }
}
