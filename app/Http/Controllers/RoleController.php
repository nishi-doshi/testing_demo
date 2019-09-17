<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use App\customer;
    

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::with('customer')->get();
        // dd($roles);
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $role=new role();
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('upload/gallery/', $filename);
            $role->image_name = $filename;
        }else
        {
            $role->image_name = '';
        }
        $role->name=$request->name;
        $role->customer_id=$request->customer_id;
        $role->save();
        return redirect('/role')->with('success','Record Inserted successfully...!!!');   
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
        $role = role::find($id);
        $customer = customer::All();
        return view('role.edit',compact('role','customer'));    
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
        $role= role::find($id);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('upload/gallery/', $filename);
            $role->image_name = $filename;
        }else{
//            return $request;         
            $role->image_name = '';
        }
        $role->name=$request->name;
        $role->customer_id=$request->cid;
        $role->save();
       return redirect('/role')->with('success','Record updated successfully...!!!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = role::find($id); 
        //$password = Hash::make('secret');
        unlink(public_path('upload/gallery/') . $role->image_name);
        $role->delete();
        return redirect('/role')->with('success','Record deleted  successfully...!!!');   
    }

    public function save()
    {
        $user = User::findOrFail($id);

        unlink(public_path('upload/gallery') . $user->avatar->file);
        
        $user->delete();

        Session::flash('deleted_user','The user has been deleted');

        return redirect('/upload/gallery');
    }
}
