<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function getProducts(Request $request){
       $products = Product::where(['url_kit' => $request->url_kit])->get();
       return json_encode($products);
    }

    public function saveProductInfo(Request $request){
        try{
            $product = Product::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->link = $request->link;
            $result = $product->update();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }

    }

    public function createProduct(Request $request){
        try{
            $product = new Product();
            $product->id_kit = $request->id_kit;
            $product->url_kit = $request->url_kit;
            $result = $product->save();
            return json_encode(['status' => $result, 'id' => $product->id]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function deleteProduct(Request $request){
        try{
            $result = Product::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first()->delete();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function saveFile(Request $request){
        try {
            $product = Product::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/kits/' . $request->url_kit . '/products/', $name);
                if (!empty($product->logo)) {
                    if (File::exists(public_path() . '/kits/' . $request->url_kit . '/products/' . $product->logo)) {
                        File::delete(public_path() . '/kits/' . $request->url_kit . '/products/' . $product->logo);
                    }
                }
                $product->logo = $name;
            }
            $product->update();
            return json_encode(['status' => true]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }
}
