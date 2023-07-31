<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $table='products';

    public function section()
    {
        // Assuming 'section_id' is the foreign key in the 'products' table that references the 'id' in the 'categories' table
        return $this->belongsTo(Category::class, 'section_id', 'id')
            ->where('category_type', 'product');
    }

    function category(){
        return $this->belongsTo('\App\Models\Category','parent_id');
    }

    function subcategory(){
        return $this->belongsTo('\App\Models\Category','subparent_id');
    }

    function getbrands(){
        return $this->belongsTo('\App\Models\Brand','brands_id');
    }

    function getProductAttr(){
        return $this->hasMany('\App\Models\ProductAttribut','product_id');
    }

    function getProductAttrVal(){
        return $this->hasOne('\App\Models\AttributeValue','id');
    }

    function getAllsizes(){
        return $this->hasMany('\App\Models\Product_size','product_id');
    }

    function getUser(){
        return $this->belongsTo('\App\Models\User','added_by');
    }

    function getPrices(){
        return $this->hasMany('\App\Models\Product_size','product_id');
    }

//    function getShopDetails(){
//        return $this->hasOne('\App\Models\Shop','added');
//    }

}
