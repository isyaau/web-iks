<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'profil';
    public $timestamps = false;
    // protected $primaryKey = 'id_warga';
}
