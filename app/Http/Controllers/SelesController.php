<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Sale;
use Session;


class SelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sales.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $items = Item::all();
        $dditems = Item::pluck("item_name", "id"); 
        return view('admin.sales.add_sales', compact('dditems', 'items'));
    }
    
    //  public function totalPrice($id)
    // {
    //     $states = Item::where('id', $id)->pluck("sale_price");
    //     return json_encode($states);
    // }

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
            'item_id' => 'required',
        ]);
        // dd($request->all());

        $sale = Sale::create([
            'item_id' => $request->item_id,
            'qty' => $request->qty,
            'discount_price' => $request->discount_price,
            'unit_price' => $request->unit_price,
            'total_price' => $request->total_price,
            'vat' => $request->vat,
            'p_vat' => $request->p_vat,
            'total_amount' => $request->total_amount,
        ]);

        Session::flash('success','Sale Inserted Successfully');
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
