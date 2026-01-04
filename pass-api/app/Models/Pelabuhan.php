<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelabuhan extends Model
{
    protected $fillable = ['kota', 'pelabuhan'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];    
}
