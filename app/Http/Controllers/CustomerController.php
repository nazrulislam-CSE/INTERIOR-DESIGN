<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Citie;
use App\Models\State;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Category;
use Auth;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        $myadminrole=Auth::user()->adminrole;
        return view('admin.customer.index', compact('myadminrole','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $cities = Citie::all();
        $upazilas = Upazila::all();
        $categories = Category::all();
        return view('admin.customer.create', compact('states','cities','upazilas','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'company_name' => 'required',
            'post' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'age' => 'required',
            'university' => 'required',
            'collage' => 'required',
            'school' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'category_id' => 'required'

        ]);

        if($request->hasfile('image')){
            $image = $request->image;
            $image_logo_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/image/',$image_logo_new_name);
            $image_logo_new_name = 'uploads/image/'.$image_logo_new_name;

        }else{
            $image_logo_new_name = '';
        }


        Customer::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'post' => $request->post,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'age' => $request->age,
            'university' => $request->university,
            'collage' => $request->collage,
            'school' => $request->school,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'address' => $request->address,
            'category_id' => $request->category_id,
            'services' => $request->services,
            'image' => $image_logo_new_name
    ]);

        Session::flash('success','Customer Inserted Successfully');
        return redirect()->back();
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
        $customers = Customer::find($id);
        $states = State::all();
        $cities = Citie::all();
        $upazilas = Upazila::all();
        $categories = Category::all();
        return view('admin.customer.edit', compact('customers','states','cities','upazilas','categories'));
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
        $customer = Customer::find($id);

        $this->validate($request,[
            'name' => 'required',
            'company_name' => 'required',
            'post' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'age' => 'required',
            'university' => 'required',
            'collage' => 'required',
            'school' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'category_id' => 'required'

        ]);

        if($request->hasfile('image')){
            $image = $request->image;
            $image_logo_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/image/',$image_logo_new_name);
            $image_logo_new_name = 'uploads/image/'.$image_logo_new_name;
        }else{
            $image_logo_new_name = '';
        }
        
        $customer->name = $request->name;
        $customer->company_name = $request->company_name;
        $customer->post = $request->post;
		$customer->phone_no = $request->phone_no;
        $customer->email = $request->email;
        $customer->age = $request->age;
        $customer->university = $request->university;
        $customer->collage = $request->collage;
        $customer->school = $request->school;
        $customer->state_id = $request->state_id;
        $customer->city_id = $request->city_id;
        $customer->district_id = $request->district_id;
        $customer->address = $request->address;
        $customer->category_id = $request->category_id;
        $customer->services = $request->services;
        $customer->image = $image_logo_new_name;
        $customer->update();

        Session::flash('success','Customer Updated Successfullly.');
        return redirect()->route('customer.index');
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
        $customer->delete();

        unlink($customer->image);

        Session::flash('info','Customer Deleted Successfully.');
        return redirect()->back();
    }

    public function getdivision($state_id){
        $division = Citie::where('state_id', $state_id)->orderBy('city_name','ASC')->get();
        return json_encode($division);
    }

    public function getupazila($district_id){
        $upazila = Upazila::where('district_id', $district_id)->orderBy('bn_name','ASC')->get();
        return json_encode($upazila);
    }



}
