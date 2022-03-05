<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\data;


class MoreController extends Controller
{
    public function layout() {
        $items= data::select('id','item','quantity')
                // ->from('addmore')
                // ->where('items_id','=','id')
                ->get();
        return view('frontend.more', ['items'=>$items]);
     }

    function more($id){
        $items = DB::table('addmore')->get()
                    ->select('id')
                    ->where('id','=',$id)
                    ->first();
        $values = array ('id' => $id);
        DB::table('addmore')->where('id')->update($values);
    }
   
}
