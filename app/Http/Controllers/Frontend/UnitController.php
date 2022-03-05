<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class UnitController extends Controller
{
    public function index()
    {
        $units = DB::table("units")->get();
        return view('frontend.form',compact('units'));
    }

}
