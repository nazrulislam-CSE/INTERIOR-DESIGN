<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'category_name' => 'required',

        ]);

       

        Category::create([
            'category_name' => $request->category_name,
        ]);

        Session::flash('success','Category Inserted Successfully');
        return redirect()->back();
    }
}
