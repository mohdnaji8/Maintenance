<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'department_id', 'employee', 'date', 'building',
        'room_number', 'floor_number', 'maintenance_type', 'phone', 'description'
    ];
}
