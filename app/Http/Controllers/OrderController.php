<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Models\Department;
use App\Models\Order;
use App\Models\User;
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
        $orders = Order::with('circle', 'department')->get();
        return view('maintenance.orders.index',['orders' => $orders])->with($data);
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
        $data['users'] = User::all();
        $data['circles'] = Circle::all();

        return view('maintenance.orders.create')->with($data);
    }
    //  return view('maintenance.orders.create', compact('order'))->with($data);
    public function store(Request $request)
    {
        Order::create($request->all());

        return redirect()->route('admin.orders.index')
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
    public function edit($id)
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        $data['users'] = User::all();
        $order = Order::findOrFail($id);
        $data['department'] = $order->department;
        $data['departments'] = Department::all();
        $data['circle']    = $order->circle;
        $data['circles']    = Circle::all();
        return view('maintenance.orders.edit', ['order' => $order])->with($data);
    }
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('admin.orders.index')
            ->with('done', 'تمت اضافة الطلب بنجاح');
    }
}
