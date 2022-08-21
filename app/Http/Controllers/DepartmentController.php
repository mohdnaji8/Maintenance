<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة- تقديم طلب';
        $data['departments'] =  Department::all();
        return view('maintenance.departments.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['content'] = 'index';
        $data['TITLE'] = 'قسم الصيانة';
        $data['main_title'] = ' مصحلة المياه';
        $data['sub_title'] = 'الخدمات الاكترونية';
        $data['sub_of_title'] = 'قسم الصيانة- تقديم طلب';
        $data['department'] = new Department();
        $data['circles'] =  Circle::all();
        return view('maintenance.departments.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Department::create($request->all());
        return redirect()->route('departments.index')
            ->with('done', 'تمت اضافة الطلب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
