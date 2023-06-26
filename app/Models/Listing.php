<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

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
        'no_doors',
        'no_seats',
        'user_id',
        'imgpath',
        'roof_type',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters){
        if($filters['search_input'] ?? false){
            $query->where($filters['tags'], 'like', request('search_input'));
        }
    }
}
