<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Osiset\ShopifyApp\ShopifyAppProvider;


class SettingController extends Controller
{
    public function setting($id){
        $shop_id=Auth::user()->id;
        $setting = Setting::where("shop_id",Auth::user()->id)->first();
        return view('Content.settings', compact('setting','shop_id'));
    }

    public function SaveUpdate(Request $request, $id){
        // dd($request->shop_id);

        $status = 0;
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $setting = Setting::where("shop_id",$id)->first();
       
        if(isset($setting)){
            $data = array();
            $data["shop_id"] = $request->shop_id;
            $data["heading"] = $request->heading ? $request->heading : $setting->heading;
            $data["sub_heading"] = $request->sub_heading ? $request->sub_heading : $setting->sub_heading;
            $data["detail"] = $request->detail ? $request->detail : $setting->detail;
            $data["popup"] = $request->popup ? $request->popup : $setting->popup;
            $data["status"] = $status;
            // dd($data);
            $setting->update($data);
            return back()->with("message", "Settings updated successfully!");
        }

        else{
            $data = array();
            $data["shop_id"] = $request->shop_id;
            $data["heading"] = $request->heading ? $request->heading : $setting->heading;
            $data["sub_heading"] = $request->sub_heading ? $request->sub_heading : $setting->sub_heading;
            $data["detail"] = $request->detail ? $request->detail : $setting->detail;
            $data["popup"] = $request->popup ? $request->popup : $setting->popup;
            $data["status"] = $status;
            Setting::insert($data);
            return back()->with("message", "Settings added successfully!");
        }

    }




    public function Product(){

        $user_id=Auth::user()->id;
        $product = Product::where("user_id",Auth::user()->id)->first();
        // dd($product);
        return view('Content.products', compact('product','user_id'));
    }


    public function SaveProduct(Request $request)
    {
    // dd($request->all());
        // $product = Setting::where("shop_id",Auth::user()->id)->first();
            $validatedData = $request->validate([
             'img_path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
            ]);
            $image = $request->file('img_path')->getClientOriginalName();
            $path = $request->file('img_path')->store('public/images');
            $title = $request->title;
            $price = $request->price;
    
            $product = new Product();
            $product->title=$title;
            $product->product_id=1;
            $product->user_id = $request->user_id;
            $product->price=$price;
            $product->img_path = $image;
            $product->img_path = $path;
            $product->save();
            $this->sendApiData($product, $request->user_id);
    }

    public function sendApiData($product, $user_id)
    {
        $shop = User::find($user_id)->first();

        $variants_array = array(
                    "sku"=> 'HEMPPLANT12',
                    "price"=> "12",
                    "grams"=> '',
                    "option1" => 'Default Title',
                    "title" => "Default Title",
                    "variant_taxable" => 0,
                );
                $images_array = array (
                "src" => "path"
                );
                $products_array =  array(
                    "product"=>array(
                        "title"=> 'Hemp to be planted',
                        "body_html"=> 'One Hemp Planted',
                        "vendor"=> 'One Hemp Planted',
                        "product_type"=> 'One Hemp Planted',
                        "published"=> true,
                        "variants" =>array($variants_array),
                        "images"=> array($images_array),
                        "options"=> array()                        
                    )
                );
        
       /// dd(json_encode($products_array));
        //  dd($products_array);
       
        // dd($variants_array);
        $response = $shop->api()->rest('POST', '/admin/api/2021-10/products.json', $products_array);
        dd($response);
        return back();







    //    return back()->with("message", "product added successfully!");

        
            // $shop = User::find($user_id)->first();
            // $body = [
            //     "product" => [
            //         "title" => $product->title,
            //         "variants" =>[0], [
            //             "price" => $product->price,
            //         ], 
            //     ]
            //     ];

            //     $response = $shop->api()->rest('POST', '/admin/api/2020-01/products.json',$body);
            //     return back()->with("message", "product added successfully!");












            

        }



    }
    


