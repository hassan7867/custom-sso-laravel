<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideos(Request $request){
        $videos = Video::where(['url_kit' => $request->url_kit])->get();
        return json_encode($videos);
    }

    public function saveVideo(Request $request){
        try{
            $video = Video::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            $video->url_video = $request->url_video;
            $result = $video->update();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }

    }

    public function createVideo(Request $request){
        try{
            $video = new Video();
            $video->id_kit = $request->id_kit;
            $video->url_kit = $request->url_kit;
            $result = $video->save();
            return json_encode(['status' => $result, 'id' => $video->id]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function deleteVideo(Request $request){
        try{
            $result = Video::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first()->delete();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }
}
