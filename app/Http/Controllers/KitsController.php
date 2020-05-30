<?php

namespace App\Http\Controllers;

use App\AddDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class KitsController extends Controller
{
    public function index(){
        $domains = AddDomain::all();
        return view('dashboard/kits/kits')->with(['domains' => $domains]);
    }

    public function addDomain()
    {
        return view('dashboard/kits/add-domain');
    }

    public function saveDomain(Request $request)
    {
        $domain= new AddDomain();
        $fileName="";
        if($request->hasFile('image')){
            $brand_logo= $request->file('image');
            $fileName = time().'.'.$brand_logo->getClientOriginalExtension();
            $request->image->move(public_path('landing-page-styles/domains'), $fileName);
            if(!File::exists(public_path('landing-page-styles/domains/'. $fileName))) {  // check file exists in directory or not
                return json_encode("Logo is not uploaded!", 401);
            }
            $input["image"] = $fileName;
        }
        $domain->image_domain=$fileName;
        $domain->domain_name=$request->name;
        $domain->domain_url=$request->url;
       $result= $domain->save();
       if ($result==true){
           return redirect('dashboard')->with('message',"Domain Added Successfuly");
       }
       else{
           return redirect()->back()->with('message',$result);
       }

    }
    public function editDomain($id){
        $editDomain = AddDomain::where('id',$id)->first();
        return view("dashboard/kits/edit-domain")->with(['editDomain'=> $editDomain]);
    }

}
