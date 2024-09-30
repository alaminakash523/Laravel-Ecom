<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DelivaryDetails;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class MyController extends Controller
{
    public function homepage(){
        $products = Product::with('category')->get();
        // return $products;
        return view("homepage", ['products'=>$products]);
    }

    public function singleProduct(Product $product){
        return view('single-product', ['product'=>$product]);
    }

    public function shop(){
        $category = Category::all();
        $products = Product::with('category')->get();
        return view('shop', ['category'=>$category, 'products'=>$products]);
    }

    public function byCategory(Category $category){
        $cat_id = $category->id;
        $categories = Category::all();
        $products = Product::where('category_id', $cat_id)->with('category')->get();
        return view("product-by-category", ['products'=>$products, 'categories'=>$categories]);
    }

    public function cart(){
        $cartProducts = Cart::with(['user','product'])->whereHas('user', function($query){
            $query->where('id',auth()->user()->id);
        })->get();
        $total = 0;
        foreach($cartProducts as $cartProduct){
            $total = $total+$cartProduct->product->price;
        }
        return view('cart',['cartProducts'=>$cartProducts, 'total'=>$total]);
    }

    public function addToCart(Product $product){
        $product_id = $product->id;
        $user_id = auth()->user()->id;

        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();
        return back()->with('success', 'Product added to Cart.');
    }

    public function deleteFromCart(Cart $product){
        $product->delete();
        return back();
    }

    public function delivaryForm(){
        return view("delivary-details");
    }

    public function addToDB(Request $request){
        $inComingData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
        ]);
        $inComingData['user_id'] = auth()->user()->id;
        DelivaryDetails::create($inComingData);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent"=> "CAPTURE",
            "application_context"=>[
                "return_url"=> route('success'),
                "cancel_url"=> route('cancel')
            ],
            "purchase_units"=> [
                [
                    "amount"=>
                        [
                            "currency_code"=> "USD",
                            "value"=> "100.00"
                        ]
                ]
            ]
        ]);

        // return "Success";
        // dd($response);
        if(isset($response['id']) && $response['id'] !=null){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
    }

    public function success(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        $paymentID= "Failed";
        if(!isset($response['error'])){
            $paymentID = $response['id'];
        }else{
            return redirect("/cancel");
        }

        //Storing Details in DB
        $userID = auth()->user()->id;
        if($userID == null){
            $userID = 1;
        }
        $cartId = auth()->user()->cart->id;
        $orders = new Order;
        $orders->cart_id = $cartId;
        $orders->user_id = $userID;
        $orders->save();
        return view("success", ['paymentID'=>$paymentID]);
    }
    public function cancel(){
        return view("cancel");
    }

    public function aboutUs(){
        return view("about");
    }
}
