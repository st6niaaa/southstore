<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QS extends Model
{
    use HasFactory;

    protected $table = 'qs';

    protected $fillable = [
        'text',
    ];
}
