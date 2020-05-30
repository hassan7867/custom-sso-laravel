<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function getTeam(Request $request){
        $team = Team::where(['url_kit' => $request->url_kit])->get();
        return json_encode($team);
    }

    public function saveTeamInfo(Request $request){
        try{
            $team = Team::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            $team->name = $request->name;
            $team->title = $request->title;
            $result = $team->update();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }

    }

    public function createTeam(Request $request){
        try{
            $team = new Team();
            $team->id_kit = $request->id_kit;
            $team->url_kit = $request->url_kit;
            $result = $team->save();
            return json_encode(['status' => $result, 'id' => $team->id]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function deleteTeam(Request $request){
        try{
            $result = Team::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first()->delete();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function saveFile(Request $request){
        try {
            $team = Team::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/kits/' . $request->url_kit . '/team/', $name);
                if (!empty($team->logo)) {
                    if (File::exists(public_path() . '/kits/' . $request->url_kit . '/team/' . $team->logo)) {
                        File::delete(public_path() . '/kits/' . $request->url_kit . '/team/' . $team->logo);
                    }
                }
                $team->logo = $name;
            }
            $team->update();
            return json_encode(['status' => true]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }
}
