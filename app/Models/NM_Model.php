<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NM_Model extends Model
{
    protected $table = 'tb_nama_pelatihan';
    protected $guarded = ['created_at','updated_at'];
}
