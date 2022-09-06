<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'requester_id', 'employee', 'date', 'building', 'maintenance_type',
        'room_number', 'floor_number',  'circle_id', 'user_id', 'phone', 'description'
    ];

    public function circle()
    {
        return $this->belongsTo(Circle::class, 'circle_id', 'id')->withDefault();
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'requester_id', 'id')->withDefault();
    }

    public function reply()
    {
        return $this->hasMany(Reply::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Reply::class, 'user_id', 'id')->withDefault();
    }
}
