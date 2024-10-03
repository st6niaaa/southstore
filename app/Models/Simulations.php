<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulations extends Model
{
    use HasFactory;

    protected $table = 'simulations';

    protected $fillable = [
        'percentagerate',
    ];
}
