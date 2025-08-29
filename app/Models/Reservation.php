<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'menu_id',
        'reservations',
        'total_menu',
        'total_price',
        'table_number',
    ];
}
