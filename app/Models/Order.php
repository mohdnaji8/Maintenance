<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use SoftDeletes;
    // protected static function boot() {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->created_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
    //         $model->updated_by = NULL;
    //     });

    //     static::updating(function ($model) {
    //         $model->updated_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
    //     });
    // }
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
        return $this->hasOne(Reply::class, 'order_id', 'id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(Reply::class, 'user_id', 'id')->withDefault();
    }

}
