<?php

namespace App\Http\Controllers;

use App\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InvestorController extends Controller
{
    public function index(Request $request){
        $data = Investor::where(['url_kit' => $request->url_kit])->get();
        return json_encode($data);
    }

    public function store(Request $request){
        try{
            $data = Investor::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            $data->name = $request->name;
            $data->title = $request->title;
            $result = $data->update();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }

    }

    public function create(Request $request){
        try{
            $data = new Investor();
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
            $result = Investor::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first()->delete();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function saveFile(Request $request){
        try {
            $data = Investor::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/kits/' . $request->url_kit . '/investors/', $name);
                if (!empty($data->logo)) {
                    if (File::exists(public_path() . '/kits/' . $request->url_kit . '/investors/' . $data->logo)) {
                        File::delete(public_path() . '/kits/' . $request->url_kit . '/investors/' . $data->logo);
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
