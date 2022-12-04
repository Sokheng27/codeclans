<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saledetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'qty',
    ];

    public function sale(){
        return $this->belongsTo(Sales::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}
