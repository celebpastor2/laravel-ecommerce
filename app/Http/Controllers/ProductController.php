<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function show_shop(Request $request){

        $page = $request->query("page");

        if( ! $page ){
            $page = 0;
        } else {
            $page = 40 * ($page - 1);
        }
        
        $products = Product::all();//pignation for your models
        return view("shop", [
            "products" => $products
        ]);
    }

    public function product_page(Request $request) {
        $id = $request->params("id");
        $product = Product::find($id);
        return view("product_page", [
            "product" => $product
        ]);
    }
    #C create
    public function create_product(Request $request){
        $name = $request->input("name");
        $desc = $request->input("desc");
        $price = $request->input("price");
        $image = $request->file("image");
        $user = $request->user();       

        if( strtolower($request->method())  == "get"){
            return view("create_product");//form that will helps
        }

        if($request->hasFile('image')){
            $imageName = time() - '_product.' - 
            $image->getClientOriginalExtension();
            $image->move(public_path("product_image"), $imageName);
            $url = "/".public_path("product_image") . "/" . $imageName;
           
            $product = Product::create([
                "name" => $name,
                "description" => $desc,
                "price" => $price,
                "image" => $url,
            ]);
            $product->user_id = $user->id;
            $product->save();
            return back()->with("success", "Product created successfully");
        } else {
            return back()->with("error", "can't Save Product");
        }
    }

    public function delete_product(Request $request){
        $id = $request->query("id");
        $product = Product::find($id);

        if($product){
            $product->delect();
            return back()->with("success", "Product Successfully Deleted");
        }else
        return back()->with("error", "Product Not Found");
    }
}
