<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use Illuminate\Http\Request;

class AdminMaintenanceController extends Controller
{
    public function index(){
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة- تقديم طلب';
        $data['circles'] =  Circle::all();
        return view('maintenance.circles.index')->with($data);
    }
}
