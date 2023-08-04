<?php

namespace App\Http\Controllers;

use App\Models\DeliverAddress;
use App\Models\Offer;
use Auth;
use App\Models\WishlistModel;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function addToCart(Request $request){
//        print_r($request->all());die;
        $sql = new Cart;
        $product_id = $request->product_id;
//        print_r($product_id);die;
        $size = $request->size;
        $user_ip = $this->getUserIP();
        $cartDatas = Cart::where('user_id',Auth::id())->where('product_id',$product_id)->where('size',$size)->count();

        if($cartDatas == 0)
        {
            if(Auth::check())
            {
                $sql->user_id = Auth::user()->id;
                $sql->ip_address = $user_ip;
                $sql->product_id = $product_id;
                $sql->product_added_by = $request->product_added_by;
                $sql->product_id = $product_id;
                $sql->product_name = $request->product_name;
                $sql->brands_id = $request->brands_id;
                $sql->section_id = $request->section_id;
                $sql->price = $request->price;
                $sql->subtotal = $request->subtotal;
                $sql->msp = $request->msp;
                $sql->sumofmsp = $request->msp * $request->cartqty;
                $sql->size = $request->size;
                $sql->cartqty = $request->quantity;
                $sql->attribute_id = $request->attribute_id;
                $sql->status = 'yes';

                $sql->save();
                $cartCount = Cart::where('user_id',Auth::id())->count();

                $cartCount = Cart::where('ip_address',$user_ip)->count();
                $productsubtotal = Cart::where('ip_address',$user_ip)->where('product_id',$product_id)->select('subtotal')->first();
                $qty = Cart::where('ip_address',$user_ip)->where('product_id',$product_id)->select('cartqty')->first();
                $cartSubtotal = Cart::where('ip_address',$user_ip)->sum('subtotal');

                return response()->json(['code'=>200,
                    'cartCount' => $cartCount,
                    'subtotal' => $productsubtotal,
                    'qty' => $qty,
                    'cartSubtotal' => $cartSubtotal,
                    'status' => 'Added to cart'
                ]);
            }
            else
            {

                $sql->ip_address = $user_ip;
                $sql->product_id = $product_id;
                $sql->product_added_by = $request->product_added_by;
                $sql->product_id = $product_id;
                $sql->product_name = $request->product_name;
                $sql->brands_id = $request->brands_id;
                $sql->section_id = $request->section_id;
                $sql->price = $request->price;
                $sql->subtotal = $request->subtotal;
                $sql->msp = $request->msp;
                $sql->sumofmsp = $request->msp * $request->cartqty;
                $sql->size = $request->size;
                $sql->cartqty = $request->quantity;
                $sql->attribute_id = $request->attribute_id;

                $sql->save();

                $cartCount = Cart::where('ip_address',$user_ip)->count();
                $productsubtotal = Cart::where('ip_address',$user_ip)->where('product_id',$product_id)->select('subtotal')->first();
                $qty = Cart::where('ip_address',$user_ip)->where('product_id',$product_id)->select('cartqty')->first();
                $cartSubtotal = Cart::where('ip_address',$user_ip)->sum('subtotal');

                return response()->json(['code'=>200,
                    'cartCount' => $cartCount,
                    'subtotal' => $productsubtotal,
                    'qty' => $qty,
                    'cartSubtotal' => $cartSubtotal,
                    'status' => 'Added to cart'
                ]);
            }
        }
        else
        {

            //           MSP IN DATABASE IS MULTIPLYING ACCORDING TO CART SIZE

            if(Auth::check()){
                $getCartQtyOfProduct = Cart::where(['product_id' => $product_id,'size' => $size])
                    ->where('user_id',Auth::id())
                    ->where('status', 'yes')
                    ->first();

                $updatedCartQty = $getCartQtyOfProduct->cartqty + 1;
                $updatedCartPrice = $getCartQtyOfProduct->subtotal + $getCartQtyOfProduct->price;
                $updateMspPrice = $getCartQtyOfProduct->msp + $getCartQtyOfProduct->msp;

                $updatingCart = Cart::where(['product_id' => $product_id,'size' => $size])
                    ->where('user_id',Auth::id())
                    ->where('status', 'yes')
                    ->update([
                        'cartqty'=>$updatedCartQty,
                        'sumofmsp' => $updateMspPrice,
                        'subtotal'=>$updatedCartPrice
                    ]);

                $cartCount = Cart::where('user_id',Auth::id())->count();
                $productsubtotal = Cart::where('user_id',Auth::id())
                    ->where('product_id',$product_id)->select('subtotal')->first();
                $qty = Cart::where('user_id',Auth::id())->where('product_id',$product_id)->select('cartqty')->first();
                $cartSubtotal = Cart::where('user_id',Auth::id())->sum('subtotal');

                return response()->json(['code'=>301,
                    'cartCount' => $cartCount,
                    'subtotal' => $productsubtotal,
                    'qty' => $qty,
                    'cartSubtotal' => $cartSubtotal,
                    'status' => 'Cart Updated'
                ]);
            }
            else{

                //            MSP IN DATABASE IS MULTIPLYING ACCORDING TO CART SIZE


                $getCartQtyOfProduct = Cart::where(['product_id' => $product_id,'size' => $size])
                    ->where('ip_address',$user_ip)
                    ->where('status', 'yes')
                    ->first();

                $updatedCartQty = $getCartQtyOfProduct->cartqty + 1;
                $updatedCartPrice = $getCartQtyOfProduct->subtotal + $getCartQtyOfProduct->price;
                $updateMspPrice = $getCartQtyOfProduct->msp + $getCartQtyOfProduct->msp;

                $updatingCart = Cart::where(['product_id' => $product_id,'size' => $size])
                    ->where('ip_address',$user_ip)
                    ->where('status', 'yes')->update(['cartqty'=>$updatedCartQty,
                        'sumofmsp' => $updateMspPrice
                        ,'subtotal'=>$updatedCartPrice
                    ]);

                $cartCount = Cart::where('ip_address',$user_ip)->count();
                $productsubtotal = Cart::where('ip_address',$user_ip)
                    ->where('product_id',$product_id)->select('subtotal')->first();
                $qty = Cart::where('ip_address',$user_ip)->where('product_id',$product_id)->select('cartqty')->first();
                $cartSubtotal = Cart::where('ip_address',$user_ip)->sum('subtotal');

                return response()->json(['code'=>301,
                    'cartCount' => $cartCount,
                    'subtotal' => $productsubtotal,
                    'qty' => $qty,
                    'cartSubtotal' => $cartSubtotal,
                    'status' => 'Cart Updated'
                ]);
            }
        }
    }

    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    function getAllCartsProducts(){
        $data['page_heading'] = 'Cart Page';
        $data['getAllCart'] = \App\Models\Cart::where('ip_address',$_SERVER['REMOTE_ADDR'])
            ->with([
                'getProducts','getBrands','getSection'
            ])
            ->get();
        return view('web.cart',$data);
    }

    function updateSizeCart(Request $request){
        $user_ip = $this->getUserIP();
        $sql = Cart::where('size', $request->size)
            ->where('product_id',$request->product_id)
            ->where('id','!=',$request->cart_id)
            ->count();
        if($sql > 0){
            $deleteExistingData = Cart::where('size', $request->size)
                ->where('product_id',$request->product_id)
                ->where('id','!=',$request->cart_id)
                ->delete();


            $getCartQtyOfProduct = Cart::where('product_id',$request->product_id)
                ->where('id',$request->cart_id)
                ->first();

            $ff = $getCartQtyOfProduct->cartqty * $request->price;

            $updateData = Cart::where('product_id',$request->product_id)
                ->where('id',$request->cart_id)
                ->update(['size' => $request->size, 'subtotal' => $ff ,'price' => $request->price
                ]);

        }else{
            $getCartQtyOfProduct = Cart::where('product_id',$request->product_id)
                ->where('id',$request->cart_id)
                ->first();

            $ff = $getCartQtyOfProduct->cartqty * $request->price;

            $updateData = Cart::where('product_id',$request->product_id)
                ->where('id',$request->cart_id)
                ->update(['size' => $request->size, 'subtotal' => $ff ,'price' => $request->price
                ]);

            $cartCount = Cart::where('ip_address',$user_ip)->count();
            $productsubtotal = Cart::where('ip_address',$user_ip)
                ->where('id',$request->cart_id)->select('subtotal')->first();
            $qty = Cart::where('ip_address',$user_ip)
                ->where('id',$request->cart_id)
                ->select('cartqty')->first();
            $cartSubtotal = Cart::where('ip_address',$user_ip)->sum('subtotal');

            return response()->json(['code'=>301,
                'cartCount' => $cartCount,
                'subtotal' => $productsubtotal,
                'qty' => $qty,
                'cartSubtotal' => $cartSubtotal,
                'status' => 'Cart Updated'
            ]);
        }

    }


    function updateQtyCart(Request $request){
        $user_ip = $this->getUserIP();

//        Array ( [product_id] => 4 [cartqty] => 2 [price] => 700 [cart_id] => 1 )
        $getCartQtyOfProduct = Cart::where('product_id',$request->product_id)
            ->where('id',$request->cart_id)
            ->first();

        $ff = $request->cartqty * $request->price;
        $sumofMsp = $getCartQtyOfProduct->msp * $request->cartqty;

        $updateData = Cart::where('product_id',$request->product_id)
            ->where('id',$request->cart_id)
            ->update(['cartqty' => $request->cartqty, 'subtotal' => $ff ,'price' => $request->price,
                'sumofmsp' => $sumofMsp
            ]);

        $cartCount = Cart::where('ip_address',$user_ip)->count();
        $productsubtotal = Cart::where('ip_address',$user_ip)
            ->where('id',$request->cart_id)->select('subtotal')->first();
        $qty = Cart::where('ip_address',$user_ip)
            ->where('id',$request->cart_id)
            ->select('cartqty')->first();
        $cartSubtotal = Cart::where('ip_address',$user_ip)->sum('subtotal');

        return response()->json(['code'=>301,
            'cartCount' => $cartCount,
            'subtotal' => $productsubtotal,
            'qty' => $qty,
            'cartSubtotal' => $cartSubtotal,
            'status' => 'Cart Updated'
        ]);

    }

    function deleteFromCart($id){
//        print_r($id);return false;
        $delete = Cart::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Product Removed from cart";
        } else {
            $success = true;
            $message = "Product not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function updateCart(Request $request)
    {
        $cartId = $request->input('cartId');
        $quantity = $request->input('quantity');

        // Update the cart in the database
        $cart = Cart::find($cartId);
        $cart->cartqty = $quantity;
        $cart->subtotal = $cart->price * $quantity; // You may need to calculate the subtotal based on the price and quantity
        $cart->save();

        // Return the updated subtotal to the frontend
        return response()->json(['updatedSubtotal' => $cart->subtotal]);
    }

    public function checkCoupon(Request $request)
    {
         $couponCode = $request->input('coupon_code');

        $couponDetails = Offer::where('code',$couponCode)->first();

        // Implement your logic here to verify the coupon code and calculate the discount amount

        $cartTotal = \App\Models\Cart::where('ip_address',$_SERVER['REMOTE_ADDR'])
            ->sum('subtotal');
        // For example, let's assume the discount percentage is 10%
        if (!$couponDetails) {
            // Coupon code is invalid or not found
            return response()->json(['error' => 'Invalid coupon code'], 422);
        }


    // Apply the discount based on the discount type
    if ($couponDetails->discount_type === 'flat') {
        // Flat amount deduction
        $discountAmount = $couponDetails['percentage_discount'];
    } elseif ($couponDetails->discount_type === 'percent') {
        // Percentage deduction
        $discountPercentage = $couponDetails['percentage_discount'];
        $discountAmount = ($discountPercentage / 100) * $cartTotal;
    } else {
        // Invalid discount type
        return response()->json(['error' => 'Invalid discount type'], 422);
    }

    // Calculate the discounted total
    $discountedTotal = $cartTotal - $discountAmount;

//    print_r($discountedTotal);die;

    // Store the applied coupon code and discounted total in the session
    Session::put('applied_coupon', $couponCode);
    Session::put('discounted_total', $discountedTotal);

    return response()->json(['discounted_total' => $discountedTotal]);
    }


    function checkout(){
        $data['page_heading'] = 'Checkout';
        $data['getAllCart'] = \App\Models\Cart::where('ip_address',$_SERVER['REMOTE_ADDR'])
            ->with([
                'getProducts','getBrands','getSection'
            ])
            ->get();
        return view('web.checkout',$data);
    }




}
