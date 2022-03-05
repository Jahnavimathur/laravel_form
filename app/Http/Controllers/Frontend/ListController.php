<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\item;
use App\Models\data;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function layout() {
        $data= item::select('id','sku','title','openingstock','created_at','status')->get();
        return view('frontend.list', ['items'=>$data]);
     }
     public function edit($id){
         $edit= item::find($id);
         $data['id']= $edit->id;
         $data['sku']= $edit->sku;
         $data['title']= $edit->title;
         $data['capacity']= $edit->capacity;
         $data['openingstock']= $edit->openingstock;
         $data['bufferstock']= $edit->bufferstock;
         $data['image']=$edit->image;
         DB::table('items')
          ->leftjoin('units', 'items.unit',"=",'units.id')
         ->leftjoin('addmore', 'items.id',"=",'addmore.items_id')
         ->select('items.*', 'units.id', 'addmore.items_id')
         ->get();
         $data['unit_id']=$edit->unit;
         $data['units']= DB::table("units")->get();
         $data['items_id']=$edit->item;
         $data['item']=DB::table("addmore")->get();
         $data['quantity_id']=$edit->quantity;
         $data['quantity']=DB::table("addmore")->get();
         return view('frontend.edit',['items'=>$data]);
     }
    
    function status_update(Request $req){
        $id = $req->id;
        $status = $req->status;
        // Request::segment($id);

        $values = array ('status' => $status);
        DB::table('items')->where('id',$id)->update($values);
        echo "success";   
        // return redirect('/list');
    }
     public function update(Request $req){
        $item = item:: find($req->id);
        $data = data:: find($req->id);
        $item->sku=$req->sku;
        $item->title=$req->title;
        $item->capacity=$req->capacity;
        $item->openingstock=$req->openingstock;
        $item->bufferstock=$req->bufferstock;
        $item->unit=$req->unit;
        $data->item=$req->item;
        $item = $data->item;
        $data->quantity=$req->quantity;
        $quantity = $data->quantity;
        if($req->hasfile('image')){
            $file=$req->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/images/', $filename);
            $item->image=$filename;
        }
        $update =$item->save();
        $last_id = $item->id;
        if($update == true){
            for($i=0; $i<count($item); $i++){
                $datasave = [
                    'items_id' => $last_id,
                    'item' => $item[$i],
                    'quantity' => $quantity[$i]
                ];
                DB::table('addmore')->update(array($datasave));
            }
        }
        return redirect('/list')->with('status', "Updated Successfully");
    }
   
}
