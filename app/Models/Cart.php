<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public  function getProducts(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function getBrands(){
        return $this->belongsTo('App\Models\Category','brands_id')
            ->where('category_type','brands');
    }

    public function getSection(){
        return $this->belongsTo('App\Models\Category','section_id');
    }

    function getSize(){
        return $this->belongsTo('App\Models\Product_size','id');
    }



    function getVendorDetails(){
        return $this->belongsTo('App\Models\User','product_added_by');
    }

//    function getCommissionDetails(){
//        return $this->belongsTo('App\Models\ComissionModel','category_id');
//    }




}
