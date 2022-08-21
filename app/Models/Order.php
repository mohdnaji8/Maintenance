<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'requester_id', 'employee', 'date', 'building',
        'room_number', 'floor_number', 'maintenance_type','circle_id', 'phone', 'description'
    ];


}
