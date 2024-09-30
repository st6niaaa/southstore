<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatory extends Model
{
    use HasFactory;

    protected $table = 'relatory';

    protected $fillable = [
        'type',
        'value',
        'description',
    ];
}
