<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AW_Model extends Model
{
  protected $table = 'tb_alokasi_waktu';
  protected $guarded = ['created_at','updated_at'];
}
