<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\customer;
use App\employee;
use session;
use Validator;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::All();
       return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request -> validate([
        //     'name' => 'required',
        //     'email'=>'required | email',
        //     'password'=>'required',
        //     'address'=>'required',
        //     'cno'=>'required']);
         $data = $request->all();
         $rules =[
            'name' => 'required',
            'email'=>'required | email',
            'password'=>'required',
            'address'=>'required',
            'cno'=>'required'];

        $validator = Validator::make($data, $rules);

        if($validator->fails())
        {
            return redirect('customer/create')->withErrors($validator);
        }else 
        {
            $customer = new Customer();
            $customer->name=$request->name;
            $customer->email=$request->email;
            $customer->password=Hash::make($request->password);
            $customer->address =$request->address;
            $customer->contact_no=$request->cno;
            // $customer->test_id=$request->testid;
            $customer->save();

            return redirect('/customer')->with('success','Record Inserted successfully...!!!');               
        }
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
        $customer = customer::find($id);
       
        return view('customer.edit',compact('customer'));
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
        $customer = customer::find($id);
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->contact_no=$request->cno;
        $customer->save();

        return redirect('/customer')->with('success', 'Record Updated successfully...!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $customer = customer::find($id);
       $customer->delete();
       return redirect('/customer')->with('success', 'Record Deleted successfully...!!!'); 
    }

}
