<?php

namespace App\Http\Controllers;

use App\AddDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class DomainsController extends Controller
{
    public function index(){
        $domains = AddDomain::where('user_id', Auth::user()->id)->get();
        return view('home')->with(['domains' => $domains]);
    }

    public function addDomain()
    {
        return view('dashboard/kits/add-domain');
    }

    public function saveDomain(Request $request)
    {
        $domain= new AddDomain();
        $fileName="";
//        if($request->hasFile('image')){
//            $brand_logo= $request->file('image');
//            $fileName = time().'.'.$brand_logo->getClientOriginalExtension();
//            $request->image->move(public_path('landing-page-styles/domains'), $fileName);
//            if(!File::exists(public_path('landing-page-styles/domains/'. $fileName))) {  // check file exists in directory or not
//                return json_encode("Logo is not uploaded!", 401);
//            }
//            $input["image"] = $fileName;
//        }
//        $domain->image_domain=null;
        $domain->user_id = Auth::user()->id;
        $domain->name = $request->name;
        $domain->redirect = $request->url;
        $domain->password_client = 0;
        $domain->personal_access_client = 0;
        $domain->revoked = 0;
        $domain->secret = bin2hex(random_bytes(50));;
        $result = $domain->save();
       if ($result==true){
           return redirect('home')->with('message',"Domain Added Successfuly");
       }
       else{
           return redirect()->back()->with('message',$result);
       }

    }

    public function updateDomain(Request $request)
    {
        $domain=  AddDomain::where('id', $request->id)->first();
        $domain->name = $request->name;
        $domain->redirect = $request->url;
        $result = $domain->update();
       if ($result==true){
           return redirect('home')->with('message',"Domain updated Successfuly");
       }
       else{
           return redirect()->back()->with('message',$result);
       }
    }
    public function editDomain($id){
        $editDomain = AddDomain::where('id',$id)->first();
        return view("dashboard/kits/edit-domain")->with(['editDomain'=> $editDomain]);
    }

    public function deleteDomain(Request $request){
        AddDomain::where('id', $request->id)->first()->delete();
        return redirect('home')->with('message',"Domain updated Successfuly");
    }

    public function tutorialWorking()
    {
        return view('working-tutorial');
    }

}
