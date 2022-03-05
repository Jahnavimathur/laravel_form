<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\data;

class item extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='items';
    protected $fillable=[
        'sku',
        'title',
        'capacity',
        'openingstock',
        'bufferstock',
        'unit',
        'image',
        'created_at'
    ];

    public function products(){
    return $this->hasMany(data::class, 'items_id', 'id');
    }
}
