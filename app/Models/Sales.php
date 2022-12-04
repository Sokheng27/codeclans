<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'total_price',
    ];

    public function saleDetail(){

        return $this->hasOne(Saledetails::class, 'sale_id','id');
        
    }
}
