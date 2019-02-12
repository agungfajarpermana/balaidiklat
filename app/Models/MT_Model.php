<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MT_Model extends Model
{
  protected $table = 'tb_mata_pelatihan';
  protected $guarded = ['created_at','updated_at'];
}
