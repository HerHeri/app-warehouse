<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formbarang extends Model
{
    use HasFactory;

    function barang(){
        return $this->belongsTo(Listbarang::class);
    }
}
