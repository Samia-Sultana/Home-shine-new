<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'availableStock',
        'totalStock',
        'unitPrice'
    ];
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
