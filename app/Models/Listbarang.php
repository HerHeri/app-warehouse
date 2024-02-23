<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listbarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'listbarangs';
}
