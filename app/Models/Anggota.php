<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'anggota';

    // protected $primaryKey = 'id_warga';
}
