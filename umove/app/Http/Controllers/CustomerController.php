<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use ActivityLogger;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','store']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $active = 'customer';
        $customers = Customer::orderBy('id','DESC')->with('user')->get();
        return view('admin.customers.index',compact('customers','active'));
    }

    public function users(Request $request)
    {
        $active = 'customer-user';
        $customers = User::
            orderBy('id','DESC')
            ->with('customer')
            ->doesntHave('roles')
            ->get();
        return view('admin.customers.users',compact('customers','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'customer-add';
        return view('admin.customers.create', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'tel' => 'required|unique:customers,tel',
        ]);
    
        $input = $request->all();
        
        $customer = Customer::create($input);
        if($customer->id){
            ActivityLogger::activity("The customer created. ID: ".$customer['id']. ", name: ".$customer['name']);
            Session::flash('title','Good Job!');
            Session::flash('message','The customer created successfully');
            Session::flash('type','success');
        }else{
            Session::flash('title','Got Issues!');
            Session::flash('message','There is an error. Please try again!');
            Session::flash('type','error');
        }
        return redirect()->route('customers.index')
                        ->with('success','Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $active = 'customer';
        $customer = Customer::find($id);
        return view('admin.customers.show',compact('customer', 'active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = 'customer';
        $customer = Customer::find($id);
        return view('admin.customers.edit',compact('customer','active'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$id,
            'tel' => 'required|unique:customers,tel,'.$id,
        ]);
    
        $input = $request->all();
        $customer = Customer::find($id);
        if($customer->update($input)){
            ActivityLogger::activity("The customer updated. ID: ".$customer['id']. ", name: ".$customer['name']);
            Session::flash('title','Good Job!');
            Session::flash('message','The customer updated successfully');
            Session::flash('type','success');
        }else{
            Session::flash('title','Got Issues!');
            Session::flash('message','There is an error. Please try again!');
            Session::flash('type','error');
        }
        return redirect()->route('customers.index')
                        ->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if($customer->delete()){
            ActivityLogger::activity("The customer deleted. ID: ".$customer['id']. ", name: ".$customer['name']);
            Session::flash('title','Good Job!');
            Session::flash('message','The customer deleted successfully');
            Session::flash('type','success');
        }else{
            Session::flash('title','Got Issues!');
            Session::flash('message','There is an error. Please try again!');
            Session::flash('type','error');
        }
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }

    public function quick_add_customer(Request $request) {
        return view('admin.customers.quick_add_customer');
    }

    public function store_quick_add_customer(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'tel' => 'required|unique:customers,tel',
        ]);
    
        $input = $request->all();
        $customer = Customer::create($input);
        if($customer) {
            ActivityLogger::activity("The customer created. ID: ".$customer['id']. ", name: ".$customer['name']);
            return response()->json(['id'=>$customer['id'], 'name' => $customer['name']], 200);
        }else {
            return response()->json('error', 404);
        }
        
    }
}
