<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'productName',
        'price',
        'catagory',
        'image1',
        'description'
    ];
    
    public function productImage(){
       return $this->hasMany('App\Models\Productimage');
    }
    public function order(){
        return $this->hasMany('App\Models\Orderproduct');
     }
    public function stock(){
        return $this->belongsTo('App\Models\Stock');
    }

    
}
