<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Image;
// use Intervention\Image\Facades\Image;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{
    public function adminForm(){
        return view('admin-login');
    }

    public function loginAdmin(Request $request){
        $incomingData = $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);
        if(auth()->attempt(['email'=>$incomingData['email'], "password"=>$incomingData['password']])){
            return redirect("/dashboard")->with("success", "You're logged in.");
        }else{
            // return "failed";
            return back()->with("failed", "Invalid Credentials");
        }
    }

    public function dashboard(){
        $category = Category::all();
        $products = Product::with('category')->get();
        return view('all_product', ['category'=>$category, 'products'=>$products]);
    }

    public function postForm(){
        $category = Category::all();
        return view("add-product", ['category'=>$category]);
    }

    public function create_Product(Request $request){
        $incomingData = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|image|max:3000',
            'category_id'=>'required'
        ]);
        $filename = auth()->user()->name. "-".uniqid().".jpg";
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image'));
        $imageData = $image->cover(120, 120)->toJpeg();
        Storage::put('public/avatars/' . $filename, $imageData);

        $incomingData['image'] = $filename;    
        Product::create($incomingData);
        return redirect('/dashboard')->with('success', 'Product Has been Added.');
    }

    public function deleteProduct(Product $product){
        $product->delete();
        return back()->with("success", "Product Deleted.");
    }

    public function editForm(Product $product){
        $category = Category::all();
        return view('edit', ['product'=>$product, 'category'=>$category]);
    }

    public function updateproduct(Product $product, Request $request){
        $incomingData = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|image|max:3000',
            'category_id'=>'required'
        ]);
        // Handling Image File
        $filename = auth()->user()->name. "-".uniqid().".jpg";
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image'));
        $imageData = $image->cover(120, 120)->toJpeg();
        Storage::disk('public')->put('avatars/' . $filename, $imageData);
        $incomingData['image'] = $filename; 


        $product->update($incomingData);
        return back()->with('success', 'Product Updated.');
    }

    public function adminbycategory(Category $category){
        $cat_id = $category->id;
        $categories = Category::all();
        $products = Product::where('category_id', $cat_id)->with('category')->get();
        return view("all_product", ['products'=>$products, 'category'=>$categories]);
    }

}
