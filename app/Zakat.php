<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    protected $table = "zakats";
    protected $guarded = [];

    //public $fillable = ['nama', 'jenisZakat', 'jenisBayar', 'jumlah', 'tanggal'];

}
