<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        // $order =  new Order();
        // $data['department'] = $order->department;
        $replies = Reply::with('order')->get();
        return view(
            'maintenance.replies.index',
            ['replies' => $replies]
        )->with($data);
    }
    public function create($order_id)
    {

        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة- تقديم طلب';
        $data['reply'] =  new Reply();
        $data['order_id'] = $order_id;
        return view('maintenance.replies.create')->with($data);
    }
    //  return view('maintenance.orders.create', compact('order'))->with($data);
    public function store(Request $request)
    {
        Reply::create($request->all());

        return redirect()->route('admin.replies.index')
            ->with('done', 'تمت اذافة الطلب بنجاح');
    }

    public function show(Reply $reply)
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        return view('maintenance.replies.show', ['reply' => $reply])->with($data);
    }
    public function edit($id)
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';
        $order = Reply::findOrFail($id);
        return view('maintenance.replies.edit', ['order' => $order])->with($data);
    }
}
