<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Models\Department;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['user'] = new User();
        $data['users'] = User::all();

        // $order =  new Order();
        // $data['department'] = $order->department;
        // $orders = Order::with('circle', 'department','user')->get();
        $orders = Order::with('circle', 'department', 'user')->where('user_id', auth()->user()->id)->get();
        return view('maintenance.orders.index', ['orders' => $orders])->with($data);
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
        $data['users'] = User::where('isAdmin', 1)->get();
        $data['circles'] = Circle::all();

        return view('maintenance.orders.create')->with($data);
    }
    //  return view('maintenance.orders.create', compact('order'))->with($data);
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages());
        Order::create($request->all());
        if (auth()->user()){
            return redirect()->route('admin.orders.index')
                ->with('done', 'تمت اذافة الطلب بنجاح');
        }else
        {
            return redirect()->back()
                ->with('done', 'تمت اذافة الطلب بنجاح');
        }

    }

    public function show(Order $order)
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        $data['orders'] =Order::all();
        $data['department'] = $order->department;
        $data['circle']    = $order->circle;
        $data['reply']    = $order->reply;
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
        $request->validate($this->rules(), $this->messages());
        $order->update($request->all());
        return redirect()->route('admin.orders.index')
            ->with('done', 'تمت اضافة الطلب بنجاح');
    }

    public function archive($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Order Archived');
    }

    public function getArchived()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        $data['departments'] = Department::all();
        // $order =  new Order();
        // $data['department'] = $order->department;
        $orders = Order::onlyTrashed()->with('circle', 'department')->get();
        return view('maintenance.orders.archived', ['orders' => $orders])->with($data);
    }

    public function rules()
    {
        return [
            'requester_id' => ['required'],
            'employee' => ['required'],
            'date' => ['required'],
            'building' => ['required'],
            'maintenance_type' => ['required'],
            'room_number' => ['required', 'numeric'],
            'floor_number' => ['required'],
            'circle_id' => ['required'],
            'user_id' => ['required'],
            'phone' => ['required', 'numeric'],
            'description' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذاالحقل مطلوب',
        ];
    }
}
