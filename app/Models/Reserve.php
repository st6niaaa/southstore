<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $table = 'reserves';

    protected $fillable = [
        'name',
        'email',
        'number',
        'cpf',
        'address',
        'product_name',
        'price',
        'payment_method',
    ];
}
