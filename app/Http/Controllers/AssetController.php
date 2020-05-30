<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AssetController extends Controller
{
    public function index(Request $request){
        $data = Asset::where(['url_kit' => $request->url_kit])->get();
        return json_encode($data);
    }

    public function store(Request $request){
        try{
            $data = Asset::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            $data->caption = $request->caption;
            $result = $data->update();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }

    }

    public function create(Request $request){
        try{
            $data = new Asset();
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
            $result = Asset::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first()->delete();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function saveFile(Request $request){
        try {
            $data = Asset::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/kits/' . $request->url_kit . '/asset/', $name);
                if (!empty($data->logo)) {
                    if (File::exists(public_path() . '/kits/' . $request->url_kit . '/asset/' . $data->logo)) {
                        File::delete(public_path() . '/kits/' . $request->url_kit . '/asset/' . $data->logo);
                    }
                }
                $data->logo = $name;
            }
            $data->update();
            return json_encode(['status' => true]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }
}
