<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Image;

use App\Models\Setting;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting=Setting::first();
        return view('backend.setting.index',['setting'=>$setting]);

    }


    public function save_settings (Request $request)
    {
    	$countData=Setting::count();

    	if($countData==0){


        // logo
        if($request->hasFile('logo')){
            $image1=$request->file('logo');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/backend/images/settings/');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage='na';
        }

        // Background Image
        if($request->hasFile('background_image')){
            $image2=$request->file('background_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/backend/images/settings/');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        // Add Data to DB
        $data=new Setting;
            $data->name=$request->name;
            $data->title=$request->title;
            $data->description=$request->description;
            $data->logo=$reThumbImage;
            $data->background_image=$reFullImage;
            // $data->background_image=$reFullImage;
            $data->save();

	    }
        else{


            // Logo
            if($request->hasFile('logo')){
                $image1=$request->file('logo');
                $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
                $dest1=public_path('/backend/images/settings/');
                $image1->move($dest1,$reThumbImage);
            }else{
                $reThumbImage=$request->logo;
            }

            // Background Image
            if($request->hasFile('background_image')){
                $image2=$request->file('background_image');
                $reFullImage=time().'.'.$image2->getClientOriginalExtension();
                $dest2=public_path('/backend/images/settings/');
                $image2->move($dest2,$reFullImage);
            }else{
                $reFullImage=$request->background_image;
            }

	    	$firstData=Setting::first();
	    	$data=Setting::find($firstData->id);
            $data->name=$request->name;
	        $data->title=$request->title;
	        $data->description=$request->description;
            $data->logo=$reThumbImage;
            $data->background_image=$reFullImage;
	        $data->save();
	    }

        return redirect('admin/setting')->with('success','პარამეტრები განახლდა.');
    }

}
