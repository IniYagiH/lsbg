<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LsbuAsesorPenugasan extends Model
{
    protected $table = 'lsbu_asesor_penugasan';
    public $timestamps = false;
    protected $guarded = ['created_at', 'updated_at', 'id'];
    protected $hidden = [
        'username'
    ];
}
