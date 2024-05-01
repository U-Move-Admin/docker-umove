<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Pagination\LengthAwarePaginator as Paginate;
use Illuminate\Auth\Events\Registered;

use App\Models\Property;
use App\Models\User;
use App\Models\Invite;
use App\Models\Image;
use App\Models\Message;
use App\Models\Review;
use App\Models\StoreDetail;
use App\Models\SavedProperty;

use Validator;
use App\Mail\MessageSent;
use App\Mail\PropertyMessage;
use App\Mail\Contact;
use App\Mail\RequestRegister;
use File;
use Session;
use DB;
use Libraries\Helpers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $office_count;
    public $successStatus = 200;
    public $errorStatus = 404;

    public function __construct()
    {
        $last_emlaks = [];
        $categories = [];
        $active_header = 0;
        $agent = [];
        $office_count = 0;
        $cities = Property::groupBy('city')->orderBy('city', 'asc')->pluck('city')->toArray();
        $store = StoreDetail::find(1)->only(['store_name', 'address', 'postcode', 'city', 'country', 'lng', 'lat', 'zoom', 'email', 'tel', 'logo']);
        view()->share(compact('last_emlaks','categories','active_header','office_count','agent','store','cities'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //dd(asset('../img/logo.png'));exit();
        $active_header = 'index';
        
        $properties = Property::with('images')->get();
        
        return view('frontend.template1.home',compact('properties','active_header'));
    }

    public function detail($furl)
    {
        $active_header = 'index';
        $property = Property::where('furl', $furl)->first();
        $id = $property['id'];
        $my_review = null;
        $saved = null;
        if(Auth::check() && Auth::user()->getRoleNames()->count() == 0)
        {
            $my_review = Review::where('property_id', $id)->where('user_id', auth()->user()->id)->first('rating');
            if($my_review) {
                $my_review = $my_review->rating;
            }
            $saved = SavedProperty::where('property_id', $id)->where('user_id', auth()->user()->id)->first('id');
            if($saved) {
                $saved = $saved->id;
            }
        }
        $reviews = Review::where('property_id', $id)->get('rating')->pluck('rating');
        $reviews = $reviews->avg();
        $property_type_name = config('home.property_type.'.$property['property_type']);
        if($property['advert_type'] == 'room' || $property['advert_type'] == 'commercial') {
            $property_type_name = config('home.property_type_for_'.$property['advert_type'].'.'.$property['property_type']);
        }
        $address = ($property['view_property']['view_address'] ? $property['address'].', ' : '').($property->view_property->view_city ? $property->city : '');
        $title = \Str::title(config('home.sale.'.$property['property_status'])).' '.$property_type_name.( trim($address) != null ? ', '.$address : $address).' £'.$property['price'];
        if($property == null){
            return redirect()->home();
        }
        return view('frontend.template1.detail',compact('property', 'active_header', 'my_review', 'reviews', 'saved', 'title', 'property_type_name'));
    }

    public function big_photo($id)
    {
        $active_header = 'detail';
        if($id == ''){
            return redirect()->home();
        }else{
            $emlak = Property::find($id);
        }
        return view('frontend.template1.big_photo',compact('emlak','active_header'));

    }

    public function listing($property_status = null, Request $request)
    {
        
        if($property_status == null) {
            $properties = Property::with('images')->selectRaw('properties.*')
            ->whereRaw('properties.confirmed = 1');
        } else {
            if($_SERVER['HTTP_HOST'] == 'localhost:8088'){
                if($property_status == 'rent') {
                    $property_status = 'to-let';
                } else {
                    $property_status = 'for-sale';
                }
            }
            $properties = Property::with('images')->selectRaw('properties.*')
            ->whereRaw('properties.confirmed = 1 AND properties.property_status = "'.$property_status.'"');
            
        }
        

        $data = $request->all();
        if(isset($data) && !empty($data)){
            if(!isset($data['price_unit'])){
                $data['price_unit'] = 'GBP';
            }
            $properties =  $properties->filter($data);
        }
        if(isset($data['sort'])){
            $sort = explode('-',$data['sort']);
            if($sort[0] =='price'){
                $properties = $properties->orderBy('properties.price',$sort[1]);
            }else if($sort[0] =='bedroom'){
                $properties = $properties->orderBy('properties.bedroom',$sort[1]);
            }else if($sort[0] =='m2'){
                $real = $real->orderBy('properties.m2',$sort[1]);
            }else if($sort[0] =='created_at'){
                $properties = $properties->orderBy('properties.created_at',$sort[1]);
            }
        } else {
            $properties = $properties->orderBy('properties.created_at','desc');
        }
        $current = $request->get('page',1);
        $query = '';
        if(!empty($request->all())){
            $i = 1;
            foreach($request->all() as $k => $params){
                if($k != 'page'){
                    $query = ($i > 1 ? '&':'?').$k.'='.$params;
                    $i++;
                }
            }
        }
        $properties = $properties->get();
        $properties = new Paginate($properties->forPage($current, 14),count($properties),14,$current,['path'=>$request->path().$query]);
        $url = $request->path();
        $active_header = $property_status.'-listing';
        
        return view('frontend.template1.listing',compact('property_status', 'properties', 'active_header','url', 'data'));
    }

    public function search_filter(Request $request)
    {
        $real = Property::with('images')->selectRaw('properties.*')
            ->whereRaw('properties.confirmed = 1');
        
        $data = $request->all();
        if(isset($data) && !empty($data)){
            $real =  $real->filter($data);
        }
        if(isset($data['sort'])){
            $sort = explode('-',$data['sort']);
            if($sort[0] =='price'){
                $real = $real->orderBy('properties.price',$sort[1]);
            }else if($sort[0] =='bedroom'){
                $real = $real->orderBy('properties.bedroom',$sort[1]);
            }else if($sort[0] =='m2'){
                $real = $real->orderBy('properties.m2',$sort[1]);
            }else if($sort[0] =='created_at'){
                $real = $real->orderBy('properties.created_at',$sort[1]);
            }
        } else {
            $real = $real->orderBy('properties.created_at','desc');
        }
        $real =  $real->get();
        $active_header = '';
        $current = $request->get('page',1);
        $emlaks = new Paginate($real->forPage($current, 14),count($real),14,$current,['pageName' => 'page','path'=>'/find']);
        return view('frontend.template1.search',compact('emlaks','active_header'));
    }

    public function contact()
    {
        $active_header = 'contact';
        $logo = '';
        $store = StoreDetail::find(1)->only(['store_name', 'address', 'postcode', 'city', 'country', 'lng', 'lat', 'zoom', 'email', 'tel', 'logo']);
        if(!empty($store['logo'])) {
            $logo = '/img/logo/logo.png';
        }
        return view('frontend.template1.contact',compact('active_header', 'store', 'logo'));
    }

    public function about()
    {
        $active_header = 'about';
        $store = StoreDetail::find(1)->only(['about_company_title', 'about_company','email']);
        return view('frontend.template1.about',compact('active_header', 'store'));
    }
    
    public function services()
    {
        $active_header = 'services';
        $store = StoreDetail::find(1)->only(['about_company_title', 'about_company','email']);
        return view('frontend.template1.services',compact('active_header', 'store'));
    }
    
    public function investments()
    {
        $active_header = 'investments';
        return view('frontend.template1.investments',compact('active_header'));
    }

    public function send_mail(Request $request)
    {
        
        Validator::make($request->all(), [
            'name'=>'required|max:50',
            'email'=>'required|email',
            'service'=>'required|max:70',
            'phone'=>'required|digits:11|numeric',
            'message'=>'required',
        ])->validate();
        $message = $request->all();
        $mail['name'] = $message['name'];
        $mail['subject'] = 'Your message has been sent successfully.';
        $mail['message'] = $mail['subject'].' We will be back soon.';
        $admin_email = env('MAIL_FROM_ADDRESS');
        try {
            Mail::to($admin_email)->send(new Contact($message));
            Mail::to($message['email'])->send(new MessageSent($mail));
        } catch (\Throwable $th) {
            throw $th;
            dd($th);exit;
        }
        
        
        Session::flash('message','Your message has been sent.');
        return redirect()->back();
    }

    public function send_property_message(Request $request)
    {
        
        Validator::make($request->all(), [
            'name'=>'required|max:50',
            'email'=>'required|email',
            'tel'=>'required|digits:11|numeric',
            'text'=>'required',
            'customer_type'=> 'required'
        ])->validate();
        $message = new Message;
        
        $data = $request->all();
        $data['customer_id'] = Auth::check() && Auth::user()->getRoleNames()->count() == 0 ? Auth::id() : null;
        $mail['name'] = $message['name'];
        if($message->fill($data)->save()) {
            $mail['name'] = $message['name'];
            $mail['subject'] = 'Your message has been sent successfully.';
            $mail['message'] = $mail['subject'].' We will be back soon.';
            $property = Property::find($message->property_id);
            try {
                Mail::to($message['email'])->send(new MessageSent($mail));
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new PropertyMessage($message, $property));
                return response()->json(['data'=>'success'],$this->successStatus);
            } catch (\Throwable $th) {
                throw $th;
                return response()->json('error',$this->errorStatus);
            }
        }
        return redirect()->back();
    }

    public function my_review()
    {
        $data = Review::where('user_id',auth()->user()->id)->get();
        return view('app.my_reviews', compact('data'));
    }

    public function give_rate(Request $request)
    {
        
        $data = $request->all();

        $review = Review::where('property_id', $data['property_id'])->where('user_id',auth()->user()->id)->first();
        if($review == null) {
            $review = new Review;
        }
        $data['user_id'] = auth()->user()->id;
        if($review->fill($data)->save()){
            return response()->json('success', 200);
        } else {
            return response()->json('error', 404);
        }
    }
    
    public function saved_properties()
    {
        $data = SavedProperty::where('user_id',auth()->user()->id)->get();
        return view('app.saved_properties', compact('data'));
    }

    public function saved(Request $request)
    {
        
        $data = $request->all();
        $saved = SavedProperty::where('property_id', $data['property_id'])->where('user_id',auth()->user()->id)->first();
        if($saved == null) {
            $saved = new SavedProperty;
            $data['user_id'] = auth()->user()->id;
            if($saved->fill($data)->save()){
                return response()->json('success', 200);
            } else {
                return response()->json('error', 404);
            }
        } else {
            $saved->delete();
            return response()->json('success', 200);
        }
    }

    public function my_messages()
    {
         $messages = Message::where('email', auth()->user()->email)
            ->where('message_type', 'send')
            ->whereNull('message_id')
            ->where('deleted',0)->orderBy('created_at','desc')->with('property','messages')->get()->toArray();
        $replies = Message::where('email', auth()->user()->email)
            ->where('message_type', 'reply')
            ->where('deleted',0)->orderBy('created_at','desc')->with('property','messages')->get()->toArray();

        return view('app.my_messages', compact('messages', 'replies'));
    }
    
    public function my_message_show($id)
    {
        Message::where('id', $id)->orWhere('message_id', $id)->update(['readed_c' => true]);
        $messages = Message::where('email', auth()->user()->email)
            ->where('id',$id)->where('deleted',0)->orderBy('created_at')->with('property','messages')->first()->toArray();
        return view('app.my_message_show', compact('messages'));
    }

    public function send_my_message($id, Request $request)
    {
        $main_message = Message::find($id);
        $message = new Message;
        $data = $request->all();
        $data['message_id'] = $id;
        $data['customer_id'] = Auth::id();
        $data['property_id'] = $main_message['property_id'];
        $data['name'] = $main_message['name'];
        $data['email'] = $main_message['email'];
        $data['tel'] = $main_message['tel'];
        $data['message_type'] = 'send';
        if($message->fill($data)->save()) {
            return redirect()->back();

        }
    }


    

}
