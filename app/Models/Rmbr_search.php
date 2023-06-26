<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rmbr_search extends Model
{
    use HasFactory;

    protected $table = 'rmbr_searchs';
    protected $fillable = [
        'brand',
        'type',
        'manuf_year',
        'kilometers',
        'drive_type',
        'shifter_type',
        'birthday',
        'price',
        'state',
        'fuel_type',
        'horse_power',
        'motor_cc',
        'no_seats',
        'no_doors',
        'user_id',
        'imgpath',
    ];
}
