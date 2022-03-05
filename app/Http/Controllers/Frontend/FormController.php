<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\item;
use App\Models\data;
use App\Models\unit;

class FormController extends Controller
{
    public function layout() {
        return view('frontend.form');
     }
    
    public function insert(Request $req){
        $data = new data;
        $item = new item;
        $item->sku=$req->sku;
        $item->title=$req->title;
        $item->capacity=$req->capacity;
        $item->openingstock=$req->openingstock;
        $item->bufferstock=$req->bufferstock;
        $item->unit=$req->unit;
        $data->item=$req->item;
        $items = $data->item;
        $data->quantity=$req->quantity;
        $quantity = $data->quantity;

        if($req->hasfile('image')){
            $file=$req->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/images/', $filename);
            $item->image=$filename;
        }
        $insert = $item->save();
        $items_id = $item->id;
        if($insert == true){
            for($i=0; $i<count($items); $i++){
                $datasave = [
                    'items_id' => $items_id,
                    'item' => $items[$i],
                    'quantity' => $quantity[$i]
                ];
                DB::table('addmore')->insert($datasave);
            }
        }
        return redirect('/form')->with('status', "Form Inserted Successfully");
    }
    
}
