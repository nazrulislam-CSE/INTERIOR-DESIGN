<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use Session;

class DistrictController extends Controller
{
    public function create()
    {
        $division = Division::all();
        return view('admin.district.create', compact('division'));
    }

}
