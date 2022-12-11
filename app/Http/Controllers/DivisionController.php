<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use Session;

class DivisionController extends Controller
{
    public function create()
    {
        return view('admin.division.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'division_name' => 'required'
        ]);

        Division::create([
            'division_name' => $request->division_name
        ]);

        Session::flash('success','Division Inserted Successfully.');
        return redirect()->back();
    }
}
