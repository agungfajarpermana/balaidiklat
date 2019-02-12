<?php

namespace App\Models;

use Hashids;
use Illuminate\Database\Eloquent\Model;

class RBPMD_Model extends Model
{
    protected $table = 'tb_rbpmd';
    protected $guarded = ['created_at','updated_at'];

    public function metode(){
      return $this->hasOne('App\Models\RBPMD_4_Model', 'tb_rbpmd_id', 'id');
    }

    public function getHashAttribute()
    {
      return Hashids::encode($this->attributes['id']);
    }
}
