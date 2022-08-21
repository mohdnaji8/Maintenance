<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Models\Department;
use Illuminate\Http\Request;

class CircleController extends Controller
{
    public function index()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة- تقديم طلب';
        $data['circles'] =  Circle::all();
        return view('maintenance.circles.index')->with($data);
    }
    public function create()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة- تقديم طلب';
        $data['circle'] =  new Circle();
        $data['departments'] =  Department::all();
        return view('maintenance.circles.create')->with($data);
    }
    public function store(Request $request)
    {
        Circle::create($request->all());
        return redirect()->route('circles.index')
            ->with('done', 'تمت اضافة الدائرة بنجاح');
    }
}
