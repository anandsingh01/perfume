<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use DB;
use Illuminate\Support\Str;
use Intervention\Image\Point;
use Razorpay\Api\Order;
use Session;
use App\Models\Cart;
use App\Models\OrdersModel;
use App\Models\OrderDetails;
use App\Models\DeliverAddress;
use App\Models\Points;
use App\Models\ComissionModel;
use App\Models\TransferCommission;
use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SaveAppliedDiscount;

use Razorpay\Api\Api;
use Exception;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
class CheckoutController extends Controller
{
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

    function cart(){
        if(Auth::check()){
            $userid = Auth::user()->id;
            $data['title'] = 'Home';
            $data['cart'] = Cart::select('carts.*',
                'product_size_attributes.size as sizeName',
                'product_size_attributes.msp as productMspFromsizeAttr',
                'product_size_attributes.flash_price as flash_price',
                'product_size_attributes.discount_pecent as discount_pecent',
                'product_size_attributes.qty as productInventoryFromSizeAttr',
                'product_size_attributes.price as productSizePrice',
                'product_size_attributes.qty as productSizeqty'
            )
                ->leftJoin("product_size_attributes",'carts.size','product_size_attributes.id')
                ->where('carts.status','yes')
                ->where('carts.ip_address',$_SERVER['REMOTE_ADDR'])
                ->orWhere('carts.user_id',$userid)
                ->with(['getProducts','getBrands','getSections'])
                ->get();

            $data['cart_count'] = $data['cart']->count();
            $data['cart_price'] = $data['cart']->sum('subtotal');
            $data['cart_msp'] = $data['cart']->sum('msp');
            $data['sumof_msp'] = '';


            foreach($data['cart'] as $cartData){
                $data['sumof_msp'] = $cartData->sum('sumofmsp');
                $data['discountonmrp'] = $data['sumof_msp'] - $cartData->sum('subtotal');
            }

            $data['getCouponsaboveCartValue'] = Coupon::where('min_cart_value','>=',$data['cart_price'])->get();
            $data['getCouponsbelowCartValue'] = Coupon::where('min_cart_value','<=',$data['cart_price'])->get();


            if(Auth::check()){
                $userData = Auth::user()->id;
            }else{
                $userData = $_SERVER['REMOTE_ADDR'];
            }
            $data['getAppliedCoupon'] = '';
            if(Auth::check()){
                $userid = Auth::user()->id;
                $userIp = $this->getUserIP();
            }else{
                $userIp = $this->getUserIP();
            }
            $data['getAppliedCoupon'] = SaveAppliedDiscount::where([
                'ip_address' => $userIp,
                'userid' => $userid,
                'is_active' => 'yes',
                'is_used' => 'no',
            ])->first();

            if(!empty($data['getAppliedCoupon'])){
                $data['Appliedcoupons'] =
                    [
                        'coupon_Code' => $data['getAppliedCoupon']->coupon_code,
                        'coupon_discount_type' =>$data['getAppliedCoupon']->couponDiscountType,
                        'coupondiscount' =>$data['getAppliedCoupon']->coupon_discount_amount
                    ];
            }else{
                $data['Appliedcoupons'] =
                    [
                        'coupon_Code' => 0,
                        'coupon_discount_type' => 0,
                        'coupondiscount' => 0
                    ];
            }

            $getpoints = Points::select('points_credit','points_debit')->where('user_id',$userid)->get();
            $data['getpoints'] = $getpoints->sum('points_credit');



            return view('web.cart', $data);
        }else{
            return redirect('/login');
        }
    }

    function applied_discount_amount(Request $request){
        $sql = new SaveAppliedDiscount ;

        $couponDetails = [
            'couponCode' => $request->couponCode,
            'couponDiscountType' => $request->couponDiscountType,
            'coupondiscount' => $request->coupondiscount,
            'couponAmount' => $request->couponAmount,
        ];
        if(Auth::check()){
            $userid = Auth::user()->id;
            $userIp = $this->getUserIP();
        }else{
            $userIp = $this->getUserIP();
        }
        $sql->coupon_code = $request->couponCode;
        $sql->coupon_discount_amount = $request->couponAmount;
        $sql->couponDiscountType = $request->couponDiscountType;
        $sql->ip_address = $userIp;
        $sql->userid = $userid;
        $sql->is_active = 'yes';
        $sql->is_used = 'no';

        if($sql->save()){
            $getAppliedCoupon = SaveAppliedDiscount::where([
                'ip_address' => $userIp,
                'userid' => $userid,
                'is_active' => 'yes',
                'is_used' => 'no',
            ])->first();
            return response()->json(['code' => 200 ,
                'coupon_Code' => $couponDetails['couponCode'],
                'coupon_discount_amount' =>$couponDetails['coupondiscount'],
                'coupon_discount_type' =>$couponDetails['couponDiscountType'],
                'coupondiscount' =>$couponDetails['couponAmount']
            ]);
        }

    }

    function removeCoupon(){
        if(Auth::check()){
            $userData = Auth::user()->id;
        }else{
            $userData = $_SERVER['REMOTE_ADDR'];
        }

        $sql = SaveAppliedDiscount::where('ip_address',$userData)->delete();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    function address(){
        if(Auth::check()){

            $data['title'] = 'Home';
            $userid = Auth::user()->id;

            $data['totalamount'] = base64_decode($_GET['totalamount']);
            $data['getpointsValue'] = $_GET['getpointsValue'];
            if(!empty($_GET['additional_coupon'])){
                $data['additionalcoupon'] = base64_decode($_GET['additional_coupon']);
            }else{
                $data['additionalcoupon'] = 0;
            }
            $data['coupon_discount_amount'] = base64_decode($_GET['coupon_discount_amount']);
            $data['couponDiscountType'] = base64_decode($_GET['couponDiscountType']);
            $data['coupon_code'] = base64_decode($_GET['coupon_code']);

            $data['cart'] = Cart::select('carts.*',
                'product_size_attributes.size as sizeName',
                'product_size_attributes.msp as productMspFromsizeAttr',
                'product_size_attributes.flash_price as flash_price',
                'product_size_attributes.discount_pecent as discount_pecent',
                'product_size_attributes.qty as productInventoryFromSizeAttr',
                'product_size_attributes.price as productSizePrice',
                'product_size_attributes.qty as productSizeqty'


            )
                ->leftJoin("product_size_attributes",'carts.size','product_size_attributes.id')
                ->where('carts.status','yes')
                ->where('carts.ip_address',$this->getUserIP())
                ->orWhere('carts.user_id',$userid)
                ->with(['getProducts','getBrands','getSections'])
                ->get();

            $data['cart_count'] = $data['cart']->count();
            $data['cart_price'] = $data['cart']->sum('subtotal');
            $data['cart_msp'] = $data['cart']->sum('msp');
            $data['sumof_msp'] = '';


            foreach($data['cart'] as $cartData){
                $data['sumof_msp'] = $cartData->sum('sumofmsp');
                $data['discountonmrp'] = $data['sumof_msp'] - $cartData->sum('subtotal');
            }

            $data['getCouponsaboveCartValue'] = Coupon::where('min_cart_value','>=',$data['cart_price'])->get();
            $data['getCouponsbelowCartValue'] = Coupon::where('min_cart_value','<=',$data['cart_price'])->get();


            if(Auth::check()){
                $userid = Auth::user()->id;
                $userIp = $this->getUserIP();
            }else{
                $userIp = $this->getUserIP();
            }
            $data['getAppliedCoupon'] = '';
            $getAppliedCoupon = SaveAppliedDiscount::where([
                'ip_address' => $userIp,
                'userid' => $userid,
                'is_active' => 'yes',
                'is_used' => 'no',
            ])->first();

            $data['deliveryAddress'] = DeliverAddress::where('addedby',Auth::user()->id)->get();

            return view('web.address', $data);
        }else{
            return redirect('/login');
        }

    }

    function saveaddress(Request $request){
        $sql = new DeliverAddress;
        $sql->name = $request->name;
        $sql->mobile = $request->mobile;
        $sql->address_one = $request->address_one;
        $sql->address_two = $request->address_two;
        $sql->pincode = $request->pincode;
        $sql->city = $request->city;
        $sql->state = $request->state;
        $sql->landmark = $request->landmark;
        $sql->address_type = $request->addresstype;
        $sql->is_default_address = $request->is_default;
        $sql->addedby = Auth::user()->id;
        $sql->user_email = Auth::user()->email;
        if($sql->save()){
            return response()->json(['code'=>200]);
        }
    }

    function updateAddress(Request $request){
        if(!Auth::check()){
            return redirect(route("frontendlogin"));
        }
        $sql = DeliverAddress::find($request->addressid);

        $sql->name = $request->name;
        $sql->mobile = $request->mobile;
        $sql->address_one = $request->address_one;
        $sql->address_two = $request->address_two;
        $sql->pincode = $request->pincode;
        $sql->city = $request->city;
        $sql->state = $request->state;
        $sql->landmark = $request->landmark;
        $sql->address_type = $request->addressType;
        $sql->is_default_address = $request->is_default;
        $sql->addedby = Auth::user()->id;
        $sql->user_email = Auth::user()->email;
        if($sql->save()){
            return response()->json(['code'=>200]);
        }
    }

//    function checkout_submit(Request $request){
//
//        print_r($request->all());
//        die;
//        if(Auth::check()){
////            print_r($request->all());die;
//            $userid = Auth::user()->id;
//            $data['totalAmount'] = $request->totalamount;
//            $data['getaddress'] = $request->getaddress;
//            $data['discount_on_mrp'] = $request->discount_on_mrp;
//            $data['coupon_discount_amount'] = $request->coupon_discount_amount;
//            $data['couponDiscountType'] = $request->couponDiscountType;
//            $data['coupon_code'] = $request->coupon_code;
//            $data['getpointsValue'] = $request->getpointsValue;
//            $data['deliveryAddress'] = DeliverAddress::where('addedby',Auth::user()->id)->where('id' , $request->getaddress)->first();
//            $data['totalOrders'] = OrdersModel::where('user_id',Auth::user()->id)->count();
//            return view('web.checkout',$data);
//        }else{
//            return redirect(route("frontendlogin"));
//        }
//
//    }

    function paymentGatewayFunction(Request $request){
        $input = $request->all();
//        print_r($input); die;
        $order_id = uniqid().rand(1111, 9999);
        $userid = Auth::user()->id;
        $getDeliverAddress = DeliverAddress::find($request->deliveryAddress);
        if(!empty($getDeliverAddress)){
            $order = new \App\Models\OrdersModel;
            $order->user_id = Auth::user()->id;
            $order->name = $getDeliverAddress->name;
            $order->address_one = $getDeliverAddress->address_one;
            $order->address_two = $getDeliverAddress->address_two;
            $order->city = $getDeliverAddress->city;
            $order->state = $getDeliverAddress->state;
            $order->landmark = $getDeliverAddress->landmark;
            $order->pincode = $getDeliverAddress->pincode;
            $order->email = $request->email;
            $order->order_status = 'active';
            $order->used_points = $request->getpointsValue;
            $order->coupon_code = $request->coupon_code;
            $order->coupon_discount_type = $request->couponDiscountType;
            $order->coupon_id = $request->coupon_id;
            $order->coupon_amount = $request->coupon_discount_amount;
            $order->payment_method = $request->payment_type;
            $order->payment_gateway = 'razorpay';
            $order->grand_total = $request->totalAmount;
            $order->order_id = $order_id;
            $order->order_status = 'new';
            $order->save();

            if(isset($request->getpointsValue)){
                $points = new Points;
                $points->points_debit = $request->getpointsValue;
                $points->user_id = Auth::user()->id;
                $points->order_id = $order_id;
                $points->points_by = 'shopping';
                $points->save();
            }


            $data['cart'] = Cart::select('carts.*',
                'product_size_attributes.size as sizeName',
                'product_size_attributes.msp as productMspFromsizeAttr',
                'product_size_attributes.flash_price as flash_price',
                'product_size_attributes.discount_pecent as discount_pecent',
                'product_size_attributes.qty as productInventoryFromSizeAttr',
                'product_size_attributes.price as productSizePrice'

            )
                ->leftJoin("product_size_attributes",'carts.size','product_size_attributes.id')
                ->where('carts.status','yes')
                ->where('carts.ip_address',$this->getUserIP())
                ->orWhere('carts.user_id',$userid)
                ->with(['getProducts','getBrands','getSections','getVendorDetails'])
                ->get();

            $data['cart_count'] = $data['cart']->count();
            $data['cart_price'] = $data['cart']->sum('subtotal');
            $data['cart_msp'] = $data['cart']->sum('msp');
            $data['sumof_msp'] = '';

            $amountToVendor = 0;

            foreach($data['cart'] as $cartsvalue){
                $user = User::find($cartsvalue->product_added_by);

                $insertInOrderDetails = new OrderDetails;
                $insertInOrderDetails->ip_address = $cartsvalue->ip_address;
                $insertInOrderDetails->user_id = $cartsvalue->user_id == '' ? '' : Auth::user()->id;
                $insertInOrderDetails->product_id = $cartsvalue->product_id;
                $insertInOrderDetails->category_id = $cartsvalue->category_id;
                $insertInOrderDetails->subcategory_id = $cartsvalue->subcategory_id;
                $insertInOrderDetails->product_name = $cartsvalue->product_name;
                $insertInOrderDetails->product_size = $cartsvalue->size;
                $insertInOrderDetails->product_pricev = $cartsvalue->price;
                $insertInOrderDetails->product_qty = $cartsvalue->cartqty;
                $insertInOrderDetails->product_added_by = $cartsvalue->product_added_by;
                $insertInOrderDetails->subtotal = $cartsvalue->cartqty * $cartsvalue->price;
                $insertInOrderDetails->order_id = $order_id;
                $insertInOrderDetails->save();

                $getCategorycomission = ComissionModel::where('category_id',$cartsvalue->subcategory_id)
                    ->orderBy('id','DESC')
                    ->first();
                $getFixedCommission = ComissionModel::where('commission_type','fixed')->orderBy('id','DESC')->first();
                $getCollectionCommission = ComissionModel::where('commission_type','collection')->orderBy('id','DESC')->first();

                $is_premium_vendor = $cartsvalue->getVendorDetails->is_premium_member;
                if($is_premium_vendor == 'no') {
                    if ($cartsvalue->price > 500) {
                        $commissionPrct = $getCategorycomission->np_commissions_above_five;
                        $fixedcommissionPrct = $getFixedCommission->fixed;
                        $collectioncommissionPrct = $getCollectionCommission->fixed;

                        $getCategorycomissionindot = $commissionPrct / 100;
                        $getfixecommissionindot = $fixedcommissionPrct / 100;
                        $getcollectionommissionindot = $collectioncommissionPrct / 100;

                        $getindot = $getCategorycomissionindot+$getfixecommissionindot+$getcollectionommissionindot;

                        $getin = $getindot * $cartsvalue->subtotal;

                        $amountToAdmin = $getin;
                        $amountToVendorAfterCatCommission = $cartsvalue->subtotal - $amountToAdmin;


                        $amountToVendor = $cartsvalue->subtotal - $amountToAdmin;
//                        print_r($amountToVendor);
//                        print_r($amountToVendorAfterCatCommission);
//                        die;
                        $checkifAddedToVendor = $user->deposit($amountToVendor);
                        if($checkifAddedToVendor->confirmed == 1){
                            $updateOrderIdToTransactionTable = Transaction::where('uuid',$checkifAddedToVendor->uuid)
                                ->update(
                                    [
                                        'order_id'=>$order_id,
                                        'product_id'=>$cartsvalue->product_id,
                                        'commissionPrcnt'=>$commissionPrct,
                                        'fixedCommissionPrcnt'=>$fixedcommissionPrct,
                                        'collectionCommissionPrcnt'=>$collectioncommissionPrct,
                                        'subtotal'=>$cartsvalue->subtotal,
                                        'vendor_id'=>$cartsvalue->product_added_by
                                    ]);

                            $insertInCommissionDivided = new TransferCommission;
                            $insertInCommissionDivided->order_id = $order_id;
                            $insertInCommissionDivided->product_id = $cartsvalue->product_id;
                            $insertInCommissionDivided->category_id = $cartsvalue->category_id;
                            $insertInCommissionDivided->subcategory_id = $cartsvalue->subcategory_id;
                            $insertInCommissionDivided->size = $cartsvalue->size;
                            $insertInCommissionDivided->vendor_id = $cartsvalue->product_added_by;
                            $insertInCommissionDivided->commission_cut = $amountToVendor;
                            $insertInCommissionDivided->without_commission = $cartsvalue->cartqty * $cartsvalue->price;
                            $insertInCommissionDivided->commissionPrct = $commissionPrct;
                            $insertInCommissionDivided->fixedcommission = $fixedcommissionPrct;
                            $insertInCommissionDivided->collectioncommission = $collectioncommissionPrct;
                            $insertInCommissionDivided->uuid = $checkifAddedToVendor->uuid;

                            $insertInCommissionDivided->save();
                        }

                    }
                }
            }


            if($request->payment_type == 'razorpay'){

                $api = new Api('rzp_test_R4vQZegHnmOzX4' , 'WWPoOwfqjDxs5OOzv7BRJymH');


                $data['totalOrders'] = OrdersModel::where('user_id',Auth::user()->id)->count();

                if(Auth::user()->is_premium_member == 'no'){
                    $getPointsToNonPremiumUser = $request->totalAmount / 100;
                    $points = new Points;
                    $points->user_id = Auth::user()->id;
                    $points->points_credit = (int)$getPointsToNonPremiumUser;
                    $points->points_by = 'shopping';
                    if($points->save()){
                        $getpoints = Points::select('points_credit','points_debit')->where('user_id',$userid)->get();
                        $sumOfPointsCredit = $getpoints->sum('points_credit');
                        if($sumOfPointsCredit >= 50){
                            $updateUserMembership = User::where('id',$userid)->update(['is_premium_member' => 'yes']);
                        }
                    }

                }else{
                    $getPointsToPremiumUser = $request->totalAmount / 100;
                    $pointToPremiumUser = $getPointsToPremiumUser*2;
                    $points = new Points;
                    $points->user_id = Auth::user()->id;
                    $points->points_credit = (int)$pointToPremiumUser;
                    $points->points_by = 'shopping';
                    $points->save();
                }



                $payment = $api->payment->fetch($input['razorpay_payment_id']);

                if(count($input)  && !empty($input['razorpay_payment_id'])) {
                    $order = OrdersModel::find($order->id);

                    $order->payment_id = $payment->id;
                    $order->amount = $payment->amount / 100;
                    $order->unpaid_amount = $payment->amount - $request->totalAmount;
                    $order->method = $payment->method;
                    $order->description = $payment->description;
                    $order->card_id = $payment->card_id;
                    $order->bank = $payment->bank;
                    $order->wallet = $payment->wallet;
                    $order->vpa = $payment->vpa;
                    $order->payer_email = $payment->email;
                    $order->payer_contact = $payment->contact;
                    $order->fee = $payment->fee;
                    $order->tax = $payment->tax;
                    $order->error_code = $payment->error_code;
                    $order->error_description = $payment->error_description;
                    $order->error_source = $payment->error_source;
                    $order->error_step = $payment->error_step;
                    $order->error_reason = $payment->error_reason;
                    if(!empty($payment->vpa)){
                        $order->rrn = $payment->acquirer_data['rrn'];
                        $order->upi_transaction_id = $payment->acquirer_data['upi_transaction_id'];
                    }

                    if(!empty($payment->card_id)){
                        $order->auth_code = $payment->acquirer_data['auth_code'];
                    }

                    $order->save();
                }

                return redirect(route('web.thankyou'));
            }
            elseif($request->payment_type == 'cod'){

                if(Auth::user()->is_premium_member == 'no'){
                    $getPointsToNonPremiumUser = $request->totalAmount / 100;
                    $points = new Points;
                    $points->user_id = Auth::user()->id;
                    $points->points_credit = (int)$getPointsToNonPremiumUser;
                    $points->points_by = 'shopping';
                    if($points->save()){
                        $getpoints = Points::select('points_credit','points_debit')->where('user_id',$userid)->get();
                        $sumOfPointsCredit = $getpoints->sum('points_credit');
                        if($sumOfPointsCredit >= 50){
                            $updateUserMembership = User::where('id',$userid)->update(['is_premium_member' => 'yes']);
                        }
                    }

                }else{
                    $getPointsToPremiumUser = $request->totalAmount / 100;
                    $pointToPremiumUser = $getPointsToPremiumUser*2;
                    $points = new Points;
                    $points->user_id = Auth::user()->id;
                    $points->points_credit = (int)$pointToPremiumUser;
                    $points->points_by = 'shopping';
                    $points->save();
                }

                echo "this code";die;
//                return redirect(route('web.thankyou'));

            }
            elseif($request->payment_type == 'wallet'){
                echo "wallet";
            }


        }



        return redirect()->back();

    }

    function thankyou(){
        $data['title'] = 'Thankyou';
        $data['order'] = OrdersModel::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
        $data['orderDetails'] = OrderDetails::with(['getVendorByProductid'])
            ->select('order_details.*','shops.*','products.*')
            ->leftJoin('products','order_details.product_id','products.id')
            ->leftJoin('shops','order_details.product_added_by','shops.user_id')
            ->where('order_details.user_id',Auth::user()->id)
            ->where('order_details.order_id', $data['order']->order_id)
            ->orderBy('order_details.id','DESC')
            ->get();
        print_r($data);die;
        return view('web.thankyou',$data);
    }

    public function checkout_submit(Request $request)
    {
        print_r($request->all());die;
        $order_id = uniqid();

        $order = \App\Models\Order::create([
            'order_id' => $order_id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'country' => $request->input('country'),
            'address_1' => $request->input('address_1'),
            'address_2' => $request->input('address_2'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'pincode' => $request->input('pincode'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'final_amount' => $request->input('final_amount'),
            'coupon_code' => $request->input('coupon_code'),
        ]);

        Session::put('order_details',$order);
        Session::put('products_details',$request->all());

        // Save the product details for the order
        $productIds = $request->input('product_id');
        $attributeIds = $request->input('attribute_id');
        $quantities = $request->input('qty');
        $prices = $request->input('price');
        $sizes = $request->input('size');

        if (
            $productIds && $attributeIds && $quantities && $prices && $sizes &&
            count($productIds) === count($attributeIds) &&
            count($productIds) === count($quantities) &&
            count($productIds) === count($prices) &&
            count($productIds) === count($sizes)
        ) {
            for ($i = 0; $i < count($productIds); $i++) {
                $order->products()->attach(
                    $productIds[$i],
                    [
                        'attribute_id' => $attributeIds[$i],
                        'quantity' => $quantities[$i],
                        'price' => $prices[$i],
                        'size' => $sizes[$i],
                    ]
                );
            }
        } else {
        }

//        die;

        // After successful submission, you can clear the cart or perform any other actions as needed

        // Redirect the user to a success page or thank-you page
        return redirect()->route('checkout.payment');
    }

    function stripe_integrate(){
        return view('web.payment');
    }


    function stripe_submit(Request $request){
        Stripe::setApiKey('sk_test_51IC66sKDGzpYlWQ2lmnGC7G9G5YFfRXe6oAWJf6mY54ho57zyixhSZV6kteU0148DrLS2wQR7spWezca0byNk7js00UC4sZleI');

        $stripe = new \Stripe\StripeClient('sk_test_51IC66sKDGzpYlWQ2lmnGC7G9G5YFfRXe6oAWJf6mY54ho57zyixhSZV6kteU0148DrLS2wQR7spWezca0byNk7js00UC4sZleI');


        $method = \Stripe\PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'number' => $request->card_no,
                'exp_month' => $request->exp_month,
                'exp_year' => $request->exp_year,
                'cvc' => $request->cvc,
            ],
        ]);
//        print_r($method);die;

        $data = $stripe->paymentIntents->create(
            [
                'amount' =>1000 * 100,
                'currency' => 'INR',
                'description' => 'Mumbai moments payment',
                'payment_method_types' => ['card'],
                'payment_method' => $method->id,
                'confirm'=> true
            ]
        );
        print_r($data);die;
    }

}
