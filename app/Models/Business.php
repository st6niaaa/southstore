<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'business';

    protected $fillable = [
        'corporate_reason',
        'name',
        'cnpj',
        'legal_nature',
        'opening_date',
        'CNAE',
        'social_capital',
        'address',
    ];
}
