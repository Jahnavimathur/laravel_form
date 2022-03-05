<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\item;

class data extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='addmore';
    protected $fillable=[
        'items_id',
        'item',
        'quantity'
    ];
    public function category(){
        return $this->belongsTo(item::class);
    }
}
