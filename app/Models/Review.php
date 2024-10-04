<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $fillable = [
        'reviewer_name',
        'reviewer_grade',
        'reviewer_desc',
        'is_anonymous',
        'reviewer_id',
        'review_code',
    ];
}
