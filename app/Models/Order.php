<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'requester_id', 'employee', 'date', 'building', 'maintenance_type',
        'room_number', 'floor_number',  'circle_id', 'user_id', 'phone', 'description'
    ];

    public function circle()
    {
        return $this->belongsTo(Circle::class, 'circle_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'requester_id', 'id');
    }

    public function reply()
    {
        return $this->hasOne(Reply::class, 'order_id', 'id');
    }
}
