<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'requester_id', 'employee', 'date', 'building',
        'room_number', 'floor_number', 'maintenance_type', 'circle_id', 'phone', 'description'
    ];

    public function circle()
    {
        return $this->belongsTo(Circle::class, 'circle_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'requester_id', 'id');
    }
}
