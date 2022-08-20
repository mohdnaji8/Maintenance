<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function circles()
    {
        return $this->hasMany(Circle::class, 'department_id', 'id');
    }
}
