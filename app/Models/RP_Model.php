<?php

namespace App\Models;

use Hashids;
use Illuminate\Database\Eloquent\Model;

class RP_Model extends Model
{
  protected $table    = 'tb_rencana_pembelajaran';
  protected $guarded  = ['created_at','updated_at'];

  public function getHashAttribute()
  {
    return Hashids::encode($this->attributes['id']);
  }
}
