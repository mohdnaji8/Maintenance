<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Models\Department;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        $data['departments'] = Department::all();
        // $order =  new Order();
        // $data['department'] = $order->department;
        $orders = Order::with('circle','department')->get();
        return view(
            'maintenance.orders.index',
            ['orders' => $orders]
        )->with($data);
    }
    public function create()
    {

        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة- تقديم طلب';
        $data['order'] =  new Order();
        $data['departments'] = Department::all();
        $data['circles'] = Circle::all();
        return view('maintenance.orders.create')->with($data);
    }
    //  return view('maintenance.orders.create', compact('order'))->with($data);
    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('orders.index')
            ->with('done', 'تمت اذافة الطلب بنجاح');
    }

    public function show(Order $order)
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        $data['department'] = $order->department;
        $data['circle']    = $order->circle;
        return view('maintenance.orders.show', ['order' => $order])->with($data);
    }
}
