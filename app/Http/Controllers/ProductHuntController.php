<?php

namespace App\Http\Controllers;

use App\ProductHunt;
use Illuminate\Http\Request;

class ProductHuntController extends Controller
{
    public function index(Request $request){
        $data = ProductHunt::where(['url_kit' => $request->url_kit])->get();
        return json_encode($data);
    }

    public function store(Request $request){
        try{
            $data = ProductHunt::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            $data->description = $request->description;
            $result = $data->update();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }

    }

    public function create(Request $request){
        try{
            $data = new ProductHunt();
            $data->id_kit = $request->id_kit;
            $data->url_kit = $request->url_kit;
            $result = $data->save();
            return json_encode(['status' => $result, 'id' => $data->id]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function delete(Request $request){
        try{
            $result = ProductHunt::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first()->delete();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }
}
