<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index(Request $request){
        $data = Company::where(['url_kit' => $request->url_kit])->first();
        return json_encode($data);
    }

    public function saveCompanyInfo(Request $request){
        try{
            $company = Company::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            $company->url_kit = $request->url_kit;
            $company->id_kit = $request->id_kit;
            $company->website = $request->website;
            $company->description = $request->description;
            $company->press_contact_name = $request->press_contact_name;
            $company->press_contact_email = $request->press_contact_email;
            $company->press_contact_phone = $request->press_contact_phone;
            $company->press_contact_link = $request->press_contact_link;
            $result = $company->update();
            return json_encode(['status' => $result]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }

    }

    public function saveFile(Request $request){
        try {
            $company = Company::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/kits/' . $request->url_kit . '/', $name);
                if($request->type === "companyLogo"){
                    if (!empty($company->logo)) {
                        if (File::exists(public_path() . '/kits/' . $request->url_kit . '/' . $company->logo)) {
                            File::delete(public_path() . '/kits/' . $request->url_kit . '/' . $company->logo);
                        }
                    }
                    $company->logo = $name;
                }
                else if($request->type === "fullWidthHeader"){
                    if (!empty($company->full_width_header)) {
                        if (File::exists(public_path() . '/kits/' . $request->url_kit . '/' . $company->full_width_header)) {
                            File::delete(public_path() . '/kits/' . $request->url_kit . '/' . $company->full_width_header);
                        }
                    }
                    $company->full_width_header = $name;
                }else if($request->type === "pressContactImage"){
                    if(!empty($company->press_contact_image)){
                        if(File::exists(public_path() . '/kits/' . $request->url_kit . '/' . $company->press_contact_image)){
                            File::delete(public_path() . '/kits/' . $request->url_kit . '/' . $company->press_contact_image);
                        }
                    }
                    $company->press_contact_image = $name;
                }
            }
            $company->update();
            return json_encode(['status' => true]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }
}
