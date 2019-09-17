<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use App\customer;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employee::with(
            'customer')->get();

        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employee = new employee();
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->password=$request->password;
        $employee->address=$request->address;
        $employee->contact_no=$request->cno;
        $employee->customer_id=$request->cid;
        $employee->save();

        return back()->with('success','Record Inserted Successfully...');

        redirect()->route('employee');
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
        $employee = employee::find($id);
         $customer = customer::All();
         
        return view('employee.edit',compact('employee','customer'));
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
        $employee=employee::find($id);
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->address=$request->address;
        $employee->contact_no=$request->cno;
        $employee->customer_id=$request->cid;
        $employee->save();
        return back()->with('success','Record Updated Successfully...');

        redirect()->route('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return back()->with('success','Record Deleted Successfully...');

        redirect()->route('employee');
    }
}
