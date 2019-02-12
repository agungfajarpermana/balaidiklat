<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul_Model extends Model
{
    protected $table = 'tb_modul';
    protected $fillable = ['judul', 'file', 'extensi'];
}
