<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


 

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
        'value',
        'product_quantity',
        'date'
    ];
    
    protected $dates = [
        'date'
    ];

    const TYPE= [
        '1'=>'飲料',
        '2'=>'本',
        '3'=>'家電',
        '4'=>'ゲーム',
        '5'=>'服',
        '6'=>'スポーツ用品',
    ];
    public $sortable = [
        'user_id',
        'name',
        'type',
        'detail',
        'value',
        'product_quantity',
        'date'
    ];
    public static function getAllItems(){
        return self::orderBy('id', 'asc')->simplePaginate(20);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
