<?php

namespace App\Http\Controllers;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\ProductAttribut;
use App\Models\Product_size;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\Print_;
use Session;
use App\Models\Brand;
use App\Models\Section;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_heading'] = 'All Products';
        $data['products'] = Product::with('section')->get();
        return view('admin.products.index',$data);
    }

    public function create()
    {
        $data['page_heading'] = 'Add Products';
        $data['sections'] = Category::where(['category_type' => 'product'])->get();
        $data['brands'] = Category::where(['category_type' => 'brands'])->get();
        return view('admin.products.create',$data);
    }

    function getcategoriesBySectionOnProduct(Request $request){
        $id = $request->section_id;
        $sql =  Category::where('section_id',$id)->where('parent_id' , 0)->get();
        return json_decode(json_encode($sql),true);
    }

    // Product Attribute & options
    function addProductSizeOptions($id){
        $data['product_details'] =  Product::where('id',$id)->first();
        $data['page_heading'] = 'Add Attribute To : '.$data['product_details']->title;
        $data['defaultProductAttrList'] = ProductAttribut::select('product_attributes.*',
            'attributes.title as attr_title',
            'attributes_values.attribute_value as attr_val'
        )
            ->leftJoin('attributes','attributes.id','product_attributes.attribute_id')
            ->leftJoin('attributes_values','attributes_values.id','product_attributes.attribute_value')
            ->where('product_attributes.product_id',$id)->where('product_attributes.is_default','yes')->get();

        $data['addtionalProductAttrList'] = ProductAttribut::select('product_attributes.*',
            'attributes.title as attr_title',
            'attributes_values.attribute_value as attr_val'
        )
            ->leftJoin('attributes','attributes.id','product_attributes.attribute_id')
            ->leftJoin('attributes_values','attributes_values.id','product_attributes.attribute_value')
            ->where('product_attributes.product_id',$id)->where('product_attributes.is_default','no')->get();

        $data['getAttributes'] = Attribute::where('category_id',$data['product_details']->parent_id)->get();
        return view('admin.products.addAttribute',$data);
    }

    function addProductAttrOptions($id){
        $data['product_details'] =  Product::where('id',$id)->first();
        $data['page_heading'] = 'Add Attribute To : '.$data['product_details']->title;
        $data['defaultProductAttrList'] = ProductAttribut::select('product_attributes.*',
            'attributes.title as attr_title',
            'attributes_values.attribute_value as attr_val'
        )
            ->leftJoin('attributes','attributes.id','product_attributes.attribute_id')
            ->leftJoin('attributes_values','attributes_values.id','product_attributes.attribute_value')
            ->where('product_attributes.product_id',$id)->where('product_attributes.is_default','yes')->get();

        $data['addtionalProductAttrList'] = ProductAttribut::select('product_attributes.*',
            'attributes.title as attr_title',
            'attributes_values.attribute_value as attr_val'
        )
            ->leftJoin('attributes','attributes.id','product_attributes.attribute_id')
            ->leftJoin('attributes_values','attributes_values.id','product_attributes.attribute_value')
            ->where('product_attributes.product_id',$id)
            ->where('product_attributes.is_default','no')->get();
        $data['productsize'] = Product_size::where('product_id',$id)->get();
        $data['getAttributes'] = Attribute::where('category_id',$data['product_details']->parent_id)->get();
        return view('admin.products.addAttribute',$data);
    }

    function productSizeAttribute(Request $request, $id){
        $sql = new Product_size;
        $sql->product_id = $request->id;
        $sql->sku = strtoupper($request->sku);
        $sql->size = $request->size;
        $sql->price = $request->price;
        $sql->msp = $request->msp;
        $sql->qty = $request->qty;
        $discountPrcnt = '';
        if(!empty($request->msp)){
            $discountPrcnt = (ceil(($request->msp - $request->price)/$request->msp*100));
        }
        $sql->discount_pecent = $discountPrcnt;
        if($sql->save()){
            return redirect('admin/products/add/attribute/display/' . $id);
        }
    }
    function saveProductAdditionalAttributes(Request $request, $id){
        $sql = new ProductAttribut;
        $sql->product_id = $request->id;
        $sql->attribute_id = $request->attribute_id;
        $sql->attribute_value = $request->attribute_value;
        $sql->is_default = 'no';
        if($sql->save()){
            return redirect('admin/products/add/attribute/display/' . $id);
        }
    }

    function editProductSizeAttrValue($id){
        $data['attr_id'] = $id;
        $data['attr_details'] = Product_size::find($id);
        $data['product_details'] =  Product::where('id',$data['attr_details']->product_id)->first();
        $data['page_heading'] = 'Add Attribute To : '.$data['product_details']->title;
        return view('admin.products.editDefaultProductAttr',$data);
    }

    function editAdditionalProductAttrValue($id){
        $data['attr_id'] = $id;
        $data['attr_details'] = ProductAttribut::find($id);
        $data['product_details'] =  Product::where('id',$data['attr_details']->product_id)->first();
        $data['getAllAttributes'] = Attribute::where('category_id',$data['product_details']->parent_id)->get();
        $data['getAllAttributesValues'] = AttributeValue::where('attribute_option',$data['attr_details']->attribute_id)->get();
        $data['page_heading'] = 'Add Attribute To : '.$data['product_details']->title;
        return view('admin.products.editAdditionalProductAttr',$data);
    }

    function updateproductSizeAttribute(Request $request, $id){
        $sql = Product_size::find($id);
        $sql->sku = strtoupper($request->sku);
        $sql->sku = $request->sku;
        $sql->qty = $request->qty;
        $sql->size = $request->size;
        $sql->price = $request->price;
        $sql->msp = $request->msp;
        $discountPrcnt = '';
        if(!empty($request->msp)){
            $discountPrcnt = (ceil(($request->msp - $request->price)/$request->msp*100));
        }
        $sql->discount_pecent = $discountPrcnt;

        $getCart = Cart::where(['product_id'=>$request->product_id,'size' => $sql->id,'status'=>'yes'])->get();
        if(!empty($getCart)){
            foreach($getCart as $getCarts){
                $updateSubTotal = $getCarts->cartqty * $request->price;
                $updateCart = Cart::where(['product_id'=>$request->product_id,'size' => $sql->id,'status'=>'yes'])
                    ->update([
                        'price' => $request->price,
                        'subtotal' => $updateSubTotal
                    ]);
            }

        }
        if($sql->save()){
            return redirect('admin/products/add/attribute/display/' . $request->product_id);
        }
    }

    function delete_product_size($id){
        $delete = Product_size::find($id);
        $delete = Product_size::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Size deleted successfully";
        } else {
            $success = true;
            $message = "Size not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    function deleteProductAddtionalAttr($id){
        $delete = ProductAttribut::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Attribute deleted successfully";
        } else {
            $success = true;
            $message = "Attribute not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    function getAttrValueFromOptions(Request $request){
        $id = $request->attribute_id;
        $sql =  AttributeValue::where('attribute_option',$id)->get();
        $options = [];
        if(!empty($sql)){
            foreach($sql as $key => $attVal){
                $options[] .= '<option value="'.$attVal->id.'">'.$attVal->attribute_value.'</option>';
            }
        }
        return $options;
    }


    function getSubcategoriesByCategoriesOnProduct(Request $request){
        $id = $request->parent_id;
        $sql =  Category::where('parent_id',$id)->get();
        return json_decode(json_encode($sql),true);
    }

    public function storee(Request $request)
    {
        $sql = new Product;
        $sql->title = $request->title;
        $sql->parent_id = $request->parent_id;
        $sql->subparent_id = $request->subparent_id;
        $sql->section_id = $request->section_id;
        $sql->brands_id = $request->brands_id;
        $sql->product_desc = $request->product_desc;
        $sql->product_actual_price = $request->product_actual_price;
        $sql->product_selling_price = $request->product_selling_price;
        $sql->product_max_selling_price = $request->product_max_selling_price;
        $sql->product_min_order = $request->product_min_order;
        $sql->product_max_order = $request->product_max_order;
//        $sql->product_sku_id = $request->product_sku_id;

        $publicPath = public_path();
        $imagesPath = $publicPath . '/images';
        $webpPath = $publicPath . '/images/webp';

        if (!File::exists($imagesPath)) {
            File::makeDirectory($imagesPath, 0755, true);
        }

        if (!File::exists($webpPath)) {
            File::makeDirectory($webpPath, 0755, true);
        }


        // Check if the image file was uploaded
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // Define the path where you want to store the uploaded image
            $path = 'images';

            // Generate a unique name for the image to avoid overwriting
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the specified path
            $image->move($path, $imageName);

            // Convert the image to WebP format and save it with a new name
            $webpImagePath = 'images/webp/' .rand(1111,9999).time(). '.webp';
            Image::make($path . '/' . $imageName)->encode('webp')->save($webpImagePath, 80);

            // Save the image name or path to your database as needed
            // For example, you can store the image name in a 'image' column of the offers table
            $sql->photo = $webpImagePath;

            // Optionally, you can also save the original image path if needed
            // $offer->image = 'images/' . $imageName;
        }


        $sql->img_alt = $request->img_alt;


        $sql->video_type = $request->video_type;

        if(isset($request->product_video)){
            if($request->hasFile('product_video')){
                $videoName = time().'.'.$request->product_video->extension();
                $path = 'admin/';
                $videopath = $request->file('product_video')->storeAs('/products/video/',$videoName);
                $realPath = $path.$videopath;
                $sql->product_video = $realPath;
            }
        }else{
            $sql->product_video = NULL;
        }

        if(isset($request->video_url)){
            $sql->video_url = $request->video_url;
        }else{
            $sql->video_url = NULL;
        }


        $sql->is_featured = $request->is_featured;

        $sql->flash_sale = $request->flash_sale;

        if(isset($request->flash_price)){
            $sql->flash_price = $request->flash_price;
        }else{
            $sql->flash_price = NULL;
        }

        if(isset($request->flash_price)){
            $sql->flash_price_start_date = $request->flash_price_start_date;
        }else{
            $sql->flash_price_start_date = NULL;
        }

        if(isset($request->flash_price)){
            $sql->flash_price_end_date = $request->flash_price_end_date;
        }else{
            $sql->flash_price_end_date = NULL;
        }

        if(isset($request->flash_price)){
            $sql->flash_product_status = $request->flash_product_status;
        }else{
            $sql->flash_product_status = NULL;
        }


        $sql->special_product = $request->special_product;

        if(isset($request->special_price)){
            $sql->special_price = $request->special_price;
        }else{
            $sql->special_price = NULL;
        }

        if(isset($request->special_price_start_date)){
            $sql->special_price_start_date = $request->special_price_start_date;
        }else{
            $sql->special_price_start_date = NULL;
        }

        if(isset($request->special_price_end_date)){
            $sql->special_price_end_date = $request->special_price_end_date;
        }else{
            $sql->special_price_end_date = NULL;
        }

        if(isset($request->special_product_status)){
            $sql->special_product_status = $request->special_product_status;

        }else{
            $sql->special_product_status = NULL;
        }


        if(isset($request->product_short_desc)){
            $sql->product_short_desc = $request->product_short_desc;
        }else{
            $sql->product_short_desc = NULL;
        }

        if(isset($request->product_coupon)){
            $sql->product_coupon = $request->product_coupon;
        }else{
            $sql->product_coupon = NULL;
        }

        if(isset($request->category_discount)){
            $sql->category_discount = $request->category_discount;
        }else{
            $sql->category_discount = NULL;
        }

        if(isset($request->category_discount_type)){
            $sql->category_discount_type = $request->category_discount_type;
        }else{
            $sql->category_discount_type = NULL;
        }

        $sql->stock = $request->stock;
        $sql->status = $request->status;


        if(isset($request->additional_pay_on_delivery)){
            $sql->additional_pay_on_delivery = $request->additional_pay_on_delivery;
        }else{
            $sql->additional_pay_on_delivery = NULL;
        }

        if(isset($request->addtional_delivery_within)){
            $sql->addtional_delivery_within = $request->addtional_delivery_within;
        }else{
            $sql->addtional_delivery_within = NULL;
        }

        if(isset($request->additional_return_within)){
            $sql->additional_return_within = $request->additional_return_within;
        }else{
            $sql->additional_return_within = NULL;
        }

        if(isset($request->addtional_size_and_fit)){
            $sql->addtional_size_and_fit = $request->addtional_size_and_fit;
        }else{
            $sql->addtional_size_and_fit = NULL;
        }

        if(isset($request->addtional_material_care)){
            $sql->addtional_material_care = $request->addtional_material_care;
        }else{
            $sql->addtional_material_care = NULL;
        }

        if(isset($request->meta_title)){
            $sql->meta_title = $request->meta_title;
        }else{
            $sql->meta_title = NULL;
        }

        if(isset($request->meta_desc)){
            $sql->meta_desc = $request->meta_desc;
        }else{
            $sql->meta_desc = NULL;
        }
        if(isset($request->meta_keywords)){
            $sql->meta_keywords = $request->meta_keywords;
        }else{
            $sql->meta_keywords = NULL;
        }

        if(isset($request->slug)){
            $slug = Str::slug(str_replace(' ', '-',$request->slug));
            $slug_count = Product::where('slug',$slug)->count();
            if($slug_count > 0){
                $slug .= time().'-'.$request->slug;
            }
            $sql->slug = $slug;
        }else{
            $slug = Str::slug(str_replace(' ', '-',$request->title));
            $slug_count = Product::where('slug',$slug)->count();
            if($slug_count > 0){
                $slug .= time().'-'.$request->slug;
            }
            $sql->slug = $slug;
        }

        $sql->is_approved = 'yes';

//        print_r($sql->slug);die;

        $sql->gallery_img_alt = $request->gallery_img_alt;
        if($sql->save()){
            // Check if the image files were uploaded
            if ($request->hasFile('productgallery')) {
                $images = $request->file('productgallery');
                $webpImagePaths = [];

                // Define the path where you want to store the uploaded images
                $path = 'images';

                foreach ($images as $image) {
                    // Generate a unique name for the image to avoid overwriting
                    $imageName = time() . '_' . $image->getClientOriginalName();

                    // Move the uploaded image to the specified path
                    $image->move($path, $imageName);

                    // Convert the image to WebP format and save it with a new name
                    $webpImagePath = 'images/webp/' . rand(1111, 9999) . time() . '.webp';
                    Image::make($path . '/' . $imageName)->encode('webp')->save($webpImagePath, 80);

                    // Store the WebP image path for each image in an array
                    $webpImagePaths[] = $webpImagePath;

                    $gallery = new \App\Models\Gallery;
                    // For example, you can store them in a JSON format in a 'productgallery' column of the products table
                    $gallery->product_id = $sql->id;
                    $gallery->image = $webpImagePath;
                    $gallery->type = 'gallery';
                    $gallery->save();
                }

                // Save the image paths to your database as needed

            }


            $products_id = $sql->id;
            return redirect('admin/products/add/attribute/display/' . $products_id);
        }
    }

    public function changeProductStatus(Request $request){
        $products = Product::find($request->product_id);
        if($products->status == 'active'){
            $products->status = 'inactive';
        }else{
            $products->status = 'active';
        }
        $products->save();
        return response()->json(['success'=>'Category status change successfully.']);
    }

    public function edit($id){
        $data['page_heading'] = 'Edit Products';

        $data['product_details'] = Product::find($id);
        $data['sections'] = Category::where(['category_type' => 'product'])->get();
        $data['brands'] = Category::where(['category_type' => 'brands'])->get();
        return view('admin.products.edit',$data);
    }

    function update(Request $request,$id){
//        print_r($request->all());die;
        $sql =  Product::find($id);
        $sql->title = $request->title;
        $sql->parent_id = $request->parent_id;
        $sql->subparent_id = $request->subparent_id;
        $sql->section_id = $request->section_id;
        $sql->brands_id = $request->brands_id;
        $sql->product_desc = $request->product_desc;

        $sql->product_min_order = $request->product_min_order;
        $sql->product_max_order = $request->product_max_order;
//        $sql->product_sku_id = $request->product_sku_id;
        if($request->hasFile('photo')){
            $imageName = time().'.'.$request->photo->extension();
            $path = 'admin/';
            $imgpath = $request->file('photo')->storeAs('/products/',$imageName);
            $realPath = $path.$imgpath;
            $sql->photo = $realPath;
        }
        $sql->img_alt = $request->img_alt;
        if ($request->hasfile('productgallery')) {
            foreach ($request->file('productgallery') as $file) {
                $name = time().'-'.$file->getClientOriginalName();
                $path = 'admin/';
                $gallerypath = $file->storeAs('/products',$name);
                $data[] = $path.$gallerypath;
                $galleryImage = implode(',' ,$data);
            }
            $sql->productgallery = $galleryImage;
        }

        $sql->gallery_img_alt = $request->gallery_img_alt;
        $sql->video_type = $request->video_type;

        if(isset($request->product_video)){
            if($request->hasFile('product_video')){
                $videoName = time().'.'.$request->product_video->extension();
                $path = 'admin/';
                $videopath = $request->file('product_video')->storeAs('/products/video/',$videoName);
                $realPath = $path.$videopath;
                $sql->product_video = $realPath;
            }
        }else{
            $sql->product_video = NULL;
        }

        if(isset($request->video_url)){
            $sql->video_url = $request->video_url;
        }else{
            $sql->video_url = NULL;
        }


        $sql->is_featured = $request->is_featured;

        $sql->flash_sale = $request->flash_sale;

        if(isset($request->flash_price)){
            $sql->flash_price = $request->flash_price;
        }else{
            $sql->flash_price = NULL;
        }

        if(isset($request->flash_price)){
            $sql->flash_price_start_date = $request->flash_price_start_date;
        }else{
            $sql->flash_price_start_date = NULL;
        }

        if(isset($request->flash_price)){
            $sql->flash_price_end_date = $request->flash_price_end_date;
        }else{
            $sql->flash_price_end_date = NULL;
        }

        if(isset($request->flash_price)){
            $sql->flash_product_status = $request->flash_product_status;
        }else{
            $sql->flash_product_status = NULL;
        }


        $sql->special_product = $request->special_product;

        if(isset($request->special_price)){
            $sql->special_price = $request->special_price;
        }else{
            $sql->special_price = NULL;
        }

        if(isset($request->special_price_start_date)){
            $sql->special_price_start_date = $request->special_price_start_date;
        }else{
            $sql->special_price_start_date = NULL;
        }

        if(isset($request->special_price_end_date)){
            $sql->special_price_end_date = $request->special_price_end_date;
        }else{
            $sql->special_price_end_date = NULL;
        }

        if(isset($request->special_product_status)){
            $sql->special_product_status = $request->special_product_status;

        }else{
            $sql->special_product_status = NULL;
        }


        if(isset($request->product_short_desc)){
            $sql->product_short_desc = $request->product_short_desc;
        }else{
            $sql->product_short_desc = NULL;
        }

        if(isset($request->product_coupon)){
            $sql->product_coupon = $request->product_coupon;
        }else{
            $sql->product_coupon = NULL;
        }

        if(isset($request->category_discount)){
            $sql->category_discount = $request->category_discount;
        }else{
            $sql->category_discount = NULL;
        }

        if(isset($request->category_discount_type)){
            $sql->category_discount_type = $request->category_discount_type;
        }else{
            $sql->category_discount_type = NULL;
        }

        $sql->stock = $request->stock;
        $sql->status = $request->status;

        $sql->status = $request->status;

        if(isset($request->additional_pay_on_delivery)){
            $sql->additional_pay_on_delivery = $request->additional_pay_on_delivery;
        }else{
            $sql->additional_pay_on_delivery = NULL;
        }

        if(isset($request->addtional_delivery_within)){
            $sql->addtional_delivery_within = $request->addtional_delivery_within;
        }else{
            $sql->addtional_delivery_within = NULL;
        }

        if(isset($request->additional_return_within)){
            $sql->additional_return_within = $request->additional_return_within;
        }else{
            $sql->additional_return_within = NULL;
        }

        if(isset($request->addtional_size_and_fit)){
            $sql->addtional_size_and_fit = $request->addtional_size_and_fit;
        }else{
            $sql->addtional_size_and_fit = NULL;
        }

        if(isset($request->addtional_material_care)){
            $sql->addtional_material_care = $request->addtional_material_care;
        }else{
            $sql->addtional_material_care = NULL;
        }

        if(isset($request->meta_title)){
            $sql->meta_title = $request->meta_title;
        }else{
            $sql->meta_title = NULL;
        }

        if(isset($request->meta_desc)){
            $sql->meta_desc = $request->meta_desc;
        }else{
            $sql->meta_desc = NULL;
        }
        if(isset($request->meta_keywords)){
            $sql->meta_keywords = $request->meta_keywords;
        }else{
            $sql->meta_keywords = NULL;
        }
        if(isset($request->fb_og_type)){
            $sql->fb_og_type = $request->fb_og_type;
        }else{
            $sql->fb_og_type = NULL;
        }
        if(isset($request->fb_og_url	)){
            $sql->fb_og_url	 = $request->fb_og_url	;
        }else{
            $sql->fb_og_url	 = NULL;
        }
        if(isset($request->fb_og_title)){
            $sql->fb_og_title = $request->fb_og_title;
        }else{
            $sql->fb_og_title = NULL;
        }
        if(isset($request->fb_og_desc)){
            $sql->fb_og_desc = $request->fb_og_desc;
        }else{
            $sql->fb_og_desc = NULL;
        }
        if(isset($request->twitter_og_type)){
            $sql->twitter_og_type = $request->twitter_og_type;
        }else{
            $sql->twitter_og_type = NULL;
        }
        if(isset($request->twitter_og_url)){
            $sql->twitter_og_url = $request->twitter_og_url;
        }else{
            $sql->twitter_og_url = NULL;
        }
        if(isset($request->twitter_og_title)){
            $sql->twitter_og_title = $request->twitter_og_title;
        }else{
            $sql->twitter_og_title = NULL;
        }
        if(isset($request->twitter_og_desc)){
            $sql->twitter_og_desc = $request->twitter_og_desc;
        }else{
            $sql->twitter_og_desc = NULL;
        }

        if($request->hasFile('fb_og_image')){
            $fbImgName = time().'.'.$request->fb_og_image->extension();
            $path = 'admin/';
            $fbimgpath = $request->file('fb_og_image')->storeAs('seo/product',$fbImgName);
            $realfbImgPath = $path.$fbimgpath;
            $sql->fb_og_image = $realfbImgPath;
        }

        if($request->hasFile('twitter_og_img')){
            $twitterImgName = time().'.'.$request->twitter_og_img->extension();
            $path = 'admin/';
            $twitterimgpath = $request->file('twitter_og_img')->storeAs('seo/product',$twitterImgName);
            $realTwiiterImgPath = $path.$twitterimgpath;
            $sql->twitter_og_img = $realTwiiterImgPath;
        }

        if(isset($request->slug)){
            $sql->slug = $request->slug;
        }else{
            $slug = Str::slug(str_replace(' ', '-',$request->title));
            $slug_count = Product::where('slug',$slug)->count();
            if($slug_count > 0){
                $slug .= time().'-'.$request->slug;
            }
            $sql->slug = $slug;
        }


        if($sql->save()){
            $products_id = $sql->id;
            return redirect('admin/products/add/attribute/display/' . $products_id);
        }
    }

    function destroy($id){
        $sql = Product::find($id);
        $deleteProductAttr = ProductAttribut::where('product_id',$id)->delete();
        $sql->delete();
        if ($sql == 1) {
            $success = true;
            $message = "Product deleted successfully";
        } else {
            $success = true;
            $message = "Product not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
