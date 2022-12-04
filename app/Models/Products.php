<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'unit_price', 'stock_balance', 'category_id', 'image'
        ];

    public function category(){
        return $this->belongsTo(Categories::class);
    }
}
