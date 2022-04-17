<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'level1',
        'level2',
        'level3',
        'price',
        'price_sp',
        'amount',
        'properties',
        'joint_purchase',
        'unit',
        'picture',
        'show_on_main_page',
        'description'
    ];
}
