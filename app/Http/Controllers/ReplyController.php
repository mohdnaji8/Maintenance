<?php

namespace App\Http\Controllers;

use App\Models\BuyOrder;
use App\Models\Order;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function index()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة';

         $order =  new Order();
        // $data['order'] = $order->reply;
        //$order = Order::where('user_id',auth()->user()->id)->get();
        die($order->where('user_id',auth()->user()->id)->get());
       // $replies = Reply::with('order')->where('reply_id', auth()->user()->id)->get();
        // $replies = Reply::all();
        return view('maintenance.replies.index', ['replies' => $replies])->with($data);
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
        $validated = $request->validate([
            'noticies' => 'required'
        ]);
        //  dd($request->order_id);
        if (!isset($request->done)) {
            $request->done = 0;
        }
        Order::where('id', $request->order_id)->update(['active' => $request->done]);
        if (Reply::where('order_id', $request->order_id)->exists()) {
            Reply::where('order_id', $request->order_id)->update([
                'done' => $request->done,
                'foundation' => $request->foundation,
                'maintenance_type' => $request->maintenance_type,
                'noticies' => $request->noticies,
            ]);
        } else {
            Reply::create($request->all());
        }
        return redirect()->route('admin.replies.index')
            ->with('done', 'تمت اضافة الرد بنجاح');
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

    public function buyorder_insert(Request $request)
    {

        $arraylength = count($request->arr[0]);
        for ($i = 0; $i < $arraylength; $i++) {
            BuyOrder::create([
                'reply_id' => $request->order_id,
                'items' => $request->arr[$i][0],
                'quantity' => json_encode((int)$request->arr[$i][1]),
                'price' => json_encode((int)$request->arr[$i][2]),
            ]);
        }
        $message = array('message' => 'تم اضافة طلب الشراء بنجاح!', 'title' => 'Updated');
        return response()->json($message);
    }
}
