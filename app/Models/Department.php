<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['circle_id', 'name'];

    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'requester_id', 'id');
    }
}
