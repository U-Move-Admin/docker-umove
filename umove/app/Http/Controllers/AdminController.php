<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Validator;

use App\Models\Property;
use App\Models\Message;
use App\Models\User;
use App\Models\StoreDetail;
use Session;
use Carbon\Carbon;
use Hash;
use ActivityLogger;

class AdminController extends Controller
{
    public $successStatus = 200;

    function __construct()
    {
        //dd(auth()->user()->id);
        $this->middleware(['auth']);
        $this->middleware('permission:store-details-update', ['only' => ['store_details', 'update_store_details']]);
        $store = StoreDetail::find(1)->only(['store_name', 'address', 'postcode', 'city', 'country', 'lng', 'lat', 'zoom', 'email', 'tel', 'logo']);
        view()->share(compact('store'));
    }

    public function index()
    {
        
        $rent_count = Property::where('property_status', 'rent')->get()->count();
        $buy_count = Property::where('property_status', 'buy')->get()->count();
        $today_messages = Message::where('deleted',0)->whereDate('created_at', Carbon::today())->orderBy('created_at')->with('property')->limit(10)->get()->toArray();
        $messages = Message::where('deleted',0)->orderBy('created_at')->with('property')->limit(10)->get()->toArray();
        return view('dashboard',compact('rent_count','buy_count', 'messages', 'today_messages'));
    }
    
    public function store_details()
    {
        $active = 'store';
        $session_id = Session::getId();
        $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
        if(is_dir($dirPath))
            File::deleteDirectory($dirPath);
    
        $logo = '';
        $store = StoreDetail::find(1);
        if(!empty($store['logo'])) {
            $logo = '/img/logo/logo.png';
        }
        return view('admin.settings.store_details', compact('store','logo','active'));
    }

    public function update_store_details(Request $request)
    {
        $data = $request->all();
        //dd($data);
        if(!empty($request->logo)){
            $is_logo = $this->upload($request, 'logo', false);
            if($is_logo) {
                $data['logo'] = 'logo.png';
            }
        }
        $store = StoreDetail::find(1);
        if(!$store) {
            //Session::flash('message',"It couldn't saved. Please try again!");
            $store = new StoreDetail;
        } 
        
        if($store->fill($data)->save()){
            ActivityLogger::activity("The store detail updated.");
            Session::flash('title','Success');
            Session::flash('message','Your listing have been creating successfuly. After checking the details, you can publish it!');
            Session::flash('type','success');
            
        }else{
            Session::flash('title','Error');
            Session::flash('message',"It couldn't saved. Please try again!");
            Session::flash('type','error');
        }
        return redirect()->route('store')
                        ->with('success','Store has been updated successfully');
    }

    public function upload(Request $request, $type, $user = null) {
        //dd(pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME));
        //dd($request['logo']->extension());
        $session_id = Session::getId();
        $file =  $_FILES[$type];
        //$file = $_FILES[$this->inputName];
        $size = $file['size'];
        $name = $file['name'];
        // check file error
        if($file['error']) {
            return array('error' => 'Upload Error #'.$file['error']);
        }

        // Validate name
        if ($name === null || $name === ''){
            return array('error' => 'File name empty.');
        }

        // Validate file size
        if ($size == 0){
            return array('error' => 'File is empty.');
        }

        // if (!is_null($this->sizeLimit) && $size > $this->sizeLimit) {
        //     return array('error' => 'File is too large.', 'preventRetry' => true);
        // }
        if($type == 'logo' && $user == null) {
            if(!empty($request->logo)){
                $dirPathNew = public_path().'/img/logo';
                if(!is_dir($dirPathNew))
                    File::makeDirectory($dirPathNew, 0777, true);
                
                if (File::moveDirectory($file['tmp_name'], $dirPathNew.'/logo.'.$request['logo']->extension())){
                    $session_id = Session::getId();
                    $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
                    if(is_dir($dirPath))
                        File::deleteDirectory($dirPath);
                    
                    return 1;
                }
            }
        }else if($type == 'logo' && $user) {
            $dirPathNew = public_path().'/img/users-logo/'.auth()->user()->id;
            if(!empty($request->logo)){
                if(!is_dir($dirPathNew))
                    File::makeDirectory($dirPathNew, 0777, true);
                
                if (File::move($file['tmp_name'], $dirPathNew.'/logo.'.$request['logo']->extension())){
                    $session_id = Session::getId();
                    chmod($dirPathNew.'/logo.'.$request['logo']->extension(), 0777);
                    $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
                    if(is_dir($dirPath))
                        File::deleteDirectory($dirPath);
                    
                    return 1;
                }
            }
        } else {
            $dirPathNew = public_path().'/img/imagetmp/'.$session_id.'/logo';
            if(!is_dir($dirPathNew))
                File::makeDirectory($dirPathNew, 0777, true);
            
            if (File::moveDirectory($file['tmp_name'], $dirPathNew.'/'.$name)){
                return array('success'=> true, "uuid" => $session_id);
            }
        }
        
    }

    public function user_profile()
    {
        $user = User::find(auth()->user()->id)->only(['name','email', 'tel', 'logo']);
        $session_id = Session::getId();
        $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
        if(is_dir($dirPath))
            File::deleteDirectory($dirPath);
    
        $logo = '';
        if(!empty($user['logo'])) {
            $logo = '/img/users-logo/'.auth()->user()->id.'/logo.png';
        }
        return view('admin.settings.my_profile', compact('user', 'logo'));
    }
    
    public function update_user_profile(Request $request)
    {
        $data = $request->only(['name','tel','logo']);
        if(isset($data['logo'])){
            $is_logo = $this->upload($request, 'logo', true);
            if($is_logo) {
                $data['logo'] = 'logo.png';
            }
        }
        $user = User::find(auth()->user()->id);
        if($user->fill($data)->save()){
            Session::flash('title','Success');
            Session::flash('message','Your data have been updated successfully.');
            Session::flash('type','success');
            
        }else{
            Session::flash('title','Error');
            Session::flash('message',"It couldn't saved. Please try again!");
            Session::flash('type','error');
        }
        return redirect()->route('profile')
                        ->with('success','Your profile has been updated successfully');
            
        

    }
    
    public function change_password()
    {
        $user = User::find(auth()->user()->id)->only(['name','email', 'tel', 'logo']);
        return view('admin.settings.change_password', compact('user'));
    }
    
    public function update_password(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
            // The passwords matches
            dd('Your current password is wrong. Please try agian!');
            Session::flash('currentPassword','Your current password is wrong. Please try agian!');
            return redirect()->back();
        }
 
        if(strcmp($request->get('current-password'), $request->get('password')) == 0){
            //Current password and new password are same
            dd('New Password cannot be same as your current password. Please choose a different password.');
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'password' => 'required|min:5|same:confirm-password',
        ]);
        
        $user = Auth()->user();
        
        $data['password'] = Hash::make($request['password']);
        if($user->fill($data)->save()){
            Session::flash('title','Success');
            Session::flash('message','Your data have been updated successfully.');
            Session::flash('type','success');
            
        }else{
            Session::flash('title','Error');
            Session::flash('message',"It couldn't saved. Please try again!");
            Session::flash('type','error');
        }
        return redirect()->route('profile')
                        ->with('success','Your profile has been updated successfully');
            
        

    }
    
    public function helps()
    {
        return view('admin.helps.index');
    }
    
    public function help_video($data)
    {
        return view('admin.helps.video', compact('data'));
    }
    
    
}
