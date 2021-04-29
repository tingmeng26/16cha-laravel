<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $table = 'members';

  public $fillable = [
    'id', 'name', 'picture', 'email'
  ];

  public $incrementing = false;
  protected $keyType = 'string';

  public function hasForm()
  {
    return $this->hasOne(Form::class, 'member_id', 'id');
  }
}
