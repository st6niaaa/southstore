<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'number',
        'cpf',
        'address',
        'product_name',
        'price',
        'payment_method',
        'created_at',
    ];
}
