<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Image;
use App\Models\ViewProperty;
use App\Models\Customer;
use App\Models\StoreDetail;

use DB;
use File;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image as Img;
use ActivityLogger; 

class PropertyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:property-list|property-create|property-edit|property-delete', ['only' => ['index','store']]);
         $this->middleware('permission:property-create', ['only' => ['create','store']]);
         $this->middleware('permission:property-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:property-delete', ['only' => ['destroy']]);
         $store = StoreDetail::find(1)->only(['store_name', 'address', 'postcode', 'city', 'country', 'lng', 'lat', 'zoom', 'email', 'tel', 'logo']);
         view()->share(compact('store'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Property::with('images');
        $properties = $properties->orderBy('id','desc')->get();
        $menu = 'property';
        $active = 'property-list';
        return view('admin.properties.index',compact('properties','menu','active'));
    }

    public function getProperties(Request $request)
    {
        $properties = Property::with('images');
        $properties = $properties->orderBy('id','desc')->get();
        return $properties;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($property_status)
    {
        $session_id = Session::getId();
        $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
        $users = User::where('users.id','!=','1')->get();
        $customers = Customer::get();
        if(is_dir($dirPath))
            File::deleteDirectory($dirPath);
        return view('admin.properties.add', compact('property_status', 'users', 'customers'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = new Property;
        
        $data = $request->all();
        $data['confirmed'] = '1';
        if($data['is_owner']) {
            $data['customer_id'] = NULL;
        }
        $data['price_type'] = 'monthly';
        if(isset($data['show_date']) && !empty($data['show_date'])){
            $data['show_date'] = Carbon::createFromFormat('m/d/Y', $data['show_date'])->format('Y-m-d');
        }
        
        $data['new_build'] = $request->boolean('new_build');
        $data['underfloor_heating'] = $request->boolean('underfloor_heating');
        $data['private_residents_lounge'] = $request->boolean('private_residents_lounge');
        $data['private_residents_terrace_garden'] = $request->boolean('private_residents_terrace_garden');
        $data['10_year_new_homes_warranty'] = $request->boolean('10_year_new_homes_warranty');
        $data['recently_renovated_throughout'] = $request->boolean('recently_renovated_throughout');
        $data['kitchen_diner'] = $request->boolean('kitchen_diner');
        $data['five_double_bedrooms'] = $request->boolean('five_double_bedrooms');
        $data['large_lounge'] = $request->boolean('large_lounge');
        if($data['property_status'] == 'rent') {
            $data['pets_allowed'] = $request->boolean('pets_allowed');
            $data['DSS_income_accepted'] = $request->boolean('DSS_income_accepted');
            $data['smokers_allowed'] = $request->boolean('smokers_allowed');
            $data['student_allowed'] = $request->boolean('student_allowed');
            $data['students_only'] = $request->boolean('students_only');
            $data['families_allowed'] = $request->boolean('families_allowed');
            $data['garden'] = $request->boolean('garden');
            $data['bill'] = $request->boolean('bill');
        }
        $data['view_location'] = $request->boolean('view_location');
        $data['current_user'] = $request->boolean('current_user');
        $data['is_photo'] = $request->boolean('is_photo');
        $data['title'] = 'For '.$data['property_status'].' '.$data['bedroom'].' bedroom'.' '.$data['property_type'];
        
        
        if($property->fill($data)->save()){
            $propertyId = $property->id;
            $session_id = Session::getId();
            //$is_image = $this->upload_all_images($propertyId, $request->image, $request->image_new_sort, $session_id);
            Property::where('id', $propertyId)->update(['furl'=>Str::slug('for-'.$property->property_status.'-'.$property->property_type.'-'.$property->advert_type.'-'.$property->city.'-'.$property->bedroom.'-beds-'.$propertyId, '-')] );
            $show_property_details = $this->show_property_details($request,$propertyId);
            if($show_property_details){
                if(!empty($request->image)){
                    $dirPath = public_path().'/img/imagetmp/'.$session_id;
                    $dirPathNew =  public_path().'/img/uploads/'.$propertyId;
                    $dirPathNewSM =  public_path('/img/uploads/'.$propertyId.'/sm');
                    $dirPathNewBig =  public_path().'/img/uploads/'.$propertyId.'/big';
                    if(!is_dir($dirPathNew)){
                        File::makeDirectory($dirPathNew, 0777, true);
                        File::makeDirectory($dirPathNewSM, 0777, true);
                        File::makeDirectory($dirPathNewBig, 0777, true);
                    }
                    if(!empty($data['image_new_sort'])){
                        $sort_images = explode(',',$data['image_new_sort']);
                    }else{
                        $sort_images = $request->image;
                    }
    
                    foreach ($sort_images as $k => $imageName) {
                        $i=$k+1;
                        if (File::moveDirectory($dirPath.'/'.$imageName,$dirPathNew.'/'.$imageName)){
                            File::copy($dirPathNew.'/'.$imageName,$dirPathNewBig.'/'.$imageName);
                            File::copy($dirPathNew.'/'.$imageName,$dirPathNewSM.'/'.$imageName);
                            
                            $img_sm = Img::make($dirPathNewSM.'/'.$imageName); //SM
                            $img_md = Img::make($dirPathNew.'/'.$imageName);
                            $img_big = Img::make($dirPathNewBig.'/'.$imageName);
                            $width = $img_big->width();
                            $height = $img_big->height();
                            
                            $dimension = 1200;
                            $dimensionH = 675;
    
                            $vertical   = (($width < $height) ? true : false);
                            $horizontal = (($width > $height) ? true : false);
                            $square     = (($width == $height) ? true : false);
                            if ($vertical) {
                                if($height  > 1200){
                                    $dimensionH = 675;
                                    $img_big->resize(null, 675, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }elseif($height  > 600){
                                    $dimensionH = 600;
                                    $img_big->resize(null, 600, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                if($height  > 300){
                                    $img_md->resize(null, 300, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_md->resizeCanvas(400, 300, 'center', false, '#ffffff');
                                $img_big->resizeCanvas($dimension, $dimensionH, 'center', false, '#ffffff');
                                if($height  > 200){
                                    $img_sm->resize(null, 150, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_sm->resizeCanvas(200, 150, 'center', false, '#ffffff');
                            } else if ($horizontal) {
                                if($width  > 1200){
                                    $img_big->resize(1200, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }elseif($width  > 800){
                                    $img_big->resize(800, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                if($width  > 400){
                                    $img_md->resize(400,null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_md->resizeCanvas(400, 300, 'center', false, '#ffffff');
                                if($width  > 200){
                                    $img_sm->resize(200, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_sm->resizeCanvas(200, 150, 'center', false, '#ffffff');
                            } else if ($square) {
                                if($width  > 1200){
                                    $img_big->resize(1200, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }elseif($width  > 800){
                                    $img_big->resize(800, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                if($width  > 400){
                                    $img_md->resize(null,300, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                    $img_md->resizeCanvas(400, 300, 'center', false, '#ffffff');
                                }
                                if($width  > 200){
                                    $img_sm->resize(null, 150, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                    $img_sm->resizeCanvas(200, 150, 'center', false, '#ffffff');
                                }
                            }
                            $img_md->save($dirPathNew.'/'.$imageName);// LG
                            //$img_big->save($dirPathNewBig.'/'.$imageName);//big
                            $img_sm->save($dirPathNewSM.'/'.$imageName);//small
                            
                            $imgs = new Image;
                            $imgs->image_name = $imageName;
                            $imgs->property_id = $propertyId;
                            $imgs->sort = $i;
                            $imgs->save();
                            $photo = 1;
                        } else { 
                            $photo = 0;
                        }
                        if($photo == 1)
                            Property::where('id', $propertyId)->update(['is_photo'=>1]);
                    }
                    
                    if(is_dir($dirPath))
                        File::deleteDirectory($dirPath);
                }
                ActivityLogger::activity("The property created. ID: ".$property['id']);
			    Session::flash('title','Success');
                Session::flash('message','Your listing have been creating successfully. After checking the details, you can publish it!');
                Session::flash('type','success');
            } else {
                Session::flash('title','Error');
                Session::flash('message',"The property details couldn't saved. Please update again!");
                Session::flash('type','error');
            }
            //ActivityLogger::activity("İçerik eklendi.İçerik başlığı '<a href=\"".asset('/detay/'.str_slug($content->title.'-'.$content->id))."\">".$data['title']."</a>'");
            
        }else{
            Session::flash('title','Error');
            Session::flash('message',"It couldn't saved. Please try again!");
            Session::flash('type','error');
        }
        return redirect()->route('properties.index')
                        ->with('success','Property created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return view('admin.roles.show',compact('role','rolePermissions'));
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = 'property';
        $property = Property::find($id);
        $customers = Customer::get();
        if(!empty($property->extra_features)) {
            $property->extra_features = explode(",",$property->extra_features);
        }
        if(isset($property['show_date']) && !empty($property['show_date'])){
            $property['show_date'] = Carbon::createFromFormat('Y-m-d', $property['show_date'])->format('d/m/Y');
        }
        $users = User::get();
        $view_property = $property->view_property;
        $session_id = Session::getId();
        $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
        if(is_dir($dirPath))
            File::deleteDirectory($dirPath);
        
        $imageId = $imageName = $imageNo = $is_image = $imageOldSort = $imageCount = array();
        if(!empty($property->images))
		{

            foreach ($property->images as $i => $images) {
                $imageId[$i] = $images->id;
                $imageName[$i] = $images->image_name;
                $imageNo[$i] = $images->sort;
                $is_image[$i] = true;
            }
            $imageOldSort = implode(",",$imageName);
            //dd($imageOldSort);
            $imageCount = count($imageName);
        }
        return view('admin.properties.edit',compact('customers','property','users', 'view_property','imageId','imageName','imageNo','is_image','imageOldSort','imageCount'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        // ]);
        $property = Property::find($id);
        $data = $request->all();
        if(isset($data['is_owner']) && $data['is_owner']) {
            $data['customer_id'] = NULL;
        }
        $data['price_type'] = 'monthly';
        if(isset($data['show_date']) && !empty($data['show_date'])){
            $data['show_date'] = Carbon::createFromFormat('m/d/Y', $data['show_date'])->format('Y-m-d');
        }
        $data['current_user'] = $request->boolean('current_user');
        if($data['property_status'] == 'buy') {
            $data['new_build'] = $request->boolean('new_build');
            $data['underfloor_heating'] = $request->boolean('underfloor_heating');
            $data['private_residents_lounge'] = $request->boolean('private_residents_lounge');
            $data['private_residents_terrace_garden'] = $request->boolean('private_residents_terrace_garden');
            $data['10_year_new_homes_warranty'] = $request->boolean('10_year_new_homes_warranty');
            $data['recently_renovated_throughout'] = $request->boolean('recently_renovated_throughout');
            $data['kitchen_diner'] = $request->boolean('kitchen_diner');
            $data['five_double_bedrooms'] = $request->boolean('five_double_bedrooms');
            $data['large_lounge'] = $request->boolean('large_lounge');
        } else {
            $data['pets_allowed'] = $request->boolean('pets_allowed');
            $data['DSS_income_accepted'] = $request->boolean('DSS_income_accepted');
            $data['smokers_allowed'] = $request->boolean('smokers_allowed');
            $data['student_allowed'] = $request->boolean('student_allowed');
            $data['students_only'] = $request->boolean('students_only');
            $data['families_allowed'] = $request->boolean('families_allowed');
            $data['garden'] = $request->boolean('garden');
            $data['bill'] = $request->boolean('bill');
        }
        $data['view_location'] = $request->boolean('view_location');
        $data['is_photo'] = $request->boolean('is_photo');
        $data['title'] = 'For '.$data['property_status'].' '.$data['bedroom'].' bedroom'.' '.$data['property_type'];
        
        // if(isset($data['Other']) && !empty($data['Other'])){
        //     $other = implode(",", $data['Other']);
        //     $data['other_features'] = $other;
        // }
        if($property->fill($data)->save()){
			$propertyId = $property->id;
            $session_id = Session::getId();
            //$is_image = $this->upload_all_images($propertyId, $request->image, $request->image_new_sort, $session_id);
            Property::where('id', $propertyId)->update(['furl'=>Str::slug('for-'.$property->property_status.'-'.$property->property_type.'-'.$property->advert_type.'-'.$property->city.'-'.$property->bedroom.'-beds-'.$propertyId, '-')] );
            $show_property_details = $this->show_property_details($request,$propertyId);
            if($show_property_details){
                if(!empty($request->image)){
                    $dirPath = public_path().'/img/imagetmp/'.$session_id;
                    $dirPathNew =  public_path().'/img/uploads/'.$propertyId;
                    $dirPathNewSM =  public_path('/img/uploads/'.$propertyId.'/sm');
                    $dirPathNewBig =  public_path().'/img/uploads/'.$propertyId.'/big';
                    $dirPathNewBig2 =  public_path().'/img/uploads/'.$propertyId.'/bg';
                    
                    if(isset($request->deleteImage) && count($request->deleteImage) > 0 ){
                        foreach($request->deleteImage as $k =>$image ){
                            $exists_image = Image::find($image);
                            if($exists_image != null){
                                if(File::exists($dirPathNew.'/'.$exists_image['image_name'])){
                                    File::delete($dirPathNew.'/'.$exists_image['image_name']);
                                }
                                if(File::exists($dirPathNewSM.'/'.$exists_image['image_name'])){
                                    File::delete($dirPathNewSM.'/'.$exists_image['image_name']);
                                }
                                if(File::exists($dirPathNewBig.'/'.$exists_image['image_name'])){
                                    File::delete($dirPathNewBig.'/'.$exists_image['image_name']);
                                }
                                $exists_image->delete();
                            }
                        }
                    }

                    if(!is_dir($dirPathNew)){
                        File::makeDirectory($dirPathNew, 0777, true);
                        File::makeDirectory($dirPathNewSM, 0777, true);
                        File::makeDirectory($dirPathNewBig, 0777, true);
                        
                    }
                    
                    foreach ($request->image as $k => $imageName) {
                        $i=$k+1;
                        if (File::moveDirectory($dirPath.'/'.$imageName,$dirPathNew.'/'.$imageName)){
                            File::copy($dirPathNew.'/'.$imageName,$dirPathNewBig.'/'.$imageName);
                            File::copy($dirPathNew.'/'.$imageName,$dirPathNewSM.'/'.$imageName);
                            
                            $img_sm = Img::make($dirPathNewSM.'/'.$imageName); //SM
                            $img_md = Img::make($dirPathNew.'/'.$imageName);
                            $img_big = Img::make($dirPathNewBig.'/'.$imageName);
                            $width = $img_big->width();
                            $height = $img_big->height();
                            
                
                            $dimension = 1200;
                            $dimensionH = 675;
    
                            $vertical   = (($width < $height) ? true : false);
                            $horizontal = (($width > $height) ? true : false);
                            $square     = (($width == $height) ? true : false);
                            if ($vertical) {
                                if($height  > 1200){
                                    $dimensionH = 675;
                                    $img_big->resize(null, 675, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }elseif($height  > 600){
                                    $dimensionH = 600;
                                    $img_big->resize(null, 600, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                if($height  > 300){
                                    $img_md->resize(null, 300, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_md->resizeCanvas(400, 300, 'center', false, '#ffffff');
                                $img_big->resizeCanvas($dimension, $dimensionH, 'center', false, '#ffffff');
                                if($height  > 200){
                                    $img_sm->resize(null, 150, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_sm->resizeCanvas(200, 150, 'center', false, '#ffffff');
                            } else if ($horizontal) {
                                if($width  > 1200){
                                    $img_big->resize(1200, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }elseif($width  > 800){
                                    $img_big->resize(800, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                if($width  > 400){
                                    $img_md->resize(400,null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_md->resizeCanvas(400, 300, 'center', false, '#ffffff');
                                if($width  > 200){
                                    $img_sm->resize(200, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                $img_sm->resizeCanvas(200, 150, 'center', false, '#ffffff');
                            } else if ($square) {
                                if($width  > 1200){
                                    $img_big->resize(1200, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }elseif($width  > 800){
                                    $img_big->resize(800, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                }
                                if($width  > 400){
                                    $img_md->resize(null,300, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                    $img_md->resizeCanvas(400, 300, 'center', false, '#ffffff');
                                }
                                if($width  > 200){
                                    $img_sm->resize(null, 150, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                    $img_sm->resizeCanvas(200, 150, 'center', false, '#ffffff');
                                }
                            }
                            $img_md->save($dirPathNew.'/'.$imageName);// LG
                            //$img_big->save($dirPathNewBig.'/'.$imageName);//big
                            $img_sm->save($dirPathNewSM.'/'.$imageName);//small
                            
                            $imgs = new Image;
                            $imgs->image_name = $imageName;
                            $imgs->property_id = $propertyId;
                            $imgs->sort = $i;
                            $imgs->save();
                            $photo = 1;
                        } else { 
                            $photo = 0;
                        }
                        if($photo == 1)
                            Property::where('id', $propertyId)->update(['is_photo'=>1]);
                    }
                    
                    if(is_dir($dirPath))
                        File::deleteDirectory($dirPath);

                    
                }
                if(!empty($data['image_new_sort'])){
                    $sort_images = explode(',',$data['image_new_sort']);
                    foreach ($sort_images as $key => $sort_img) {
                        $image = Image::where(['property_id'=>$property->id,'image_name'=>$sort_img])->first();
                        if(!empty($image->id)){
                            $image->update(['sort'=>$key+1]);  
                        }
                    }
                }
                ActivityLogger::activity("The property updated. ID: ".$property['id']);
                Session::flash('title','Success');
                Session::flash('message','Your listing have been updated successfully. After checking the details, you can publish it!');
                Session::flash('type','success');
                
            }else {
                Session::flash('title','Error');
                Session::flash('message',"The property details couldn't saved. Please update again!");
                Session::flash('type','error');
            }

            //ActivityLogger::activity("İçerik eklendi.İçerik başlığı '<a href=\"".asset('/detay/'.str_slug($content->title.'-'.$content->id))."\">".$data['title']."</a>'");
            
        }else{
            Session::flash('title','Error');
            Session::flash('message',"It couldn't saved. Please try again!");
            Session::flash('type','error');
        }
        
        return redirect()->route('properties.index')
                        ->with('success','Property updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        if(DB::table("properties")->where('id',$id)->delete()){
            ActivityLogger::activity("The property deleted. ID: ".$property['id']);
            Session::flash('title','Success');
            Session::flash('message','The property ('.$id.') have been deleted.');
            Session::flash('type','success');
            
        }else {
            Session::flash('title','Error');
            Session::flash('message',"Something wrong. Please try again!");
            Session::flash('type','error');
        }
        return redirect()->route('properties.index')
                        ->with('success','Property deleted successfully');
    }

    public function show_property_details($request,$propertyId)
    {
        $view = ViewProperty::where('property_id',$propertyId)->first();
        $data = $request->only(['property_id','view_postcode','view_address', 'view_location', 'view_property_type','view_address2', 'view_bedroom', 'view_bathroom', 'view_address3', 'view_furnished', 'view_city', 'view_weekly_price', 'view_price',
        'view_new_build','view_kitchen_diner','view_underfloor_heating', 'view_private_residents_lounge', 'view_private_residents_terrace_garden', 'view_10_year_new_homes_warranty', 'view_recently_renovated_throughout', 'view_five_double_bedrooms', 'view_large_lounge',
        'view_deposit', 'view_min_tenancy_length', 'view_max_tenancy_length', 'view_number_tenant', 'view_show_date', 'view_bill', 'view_parking', 'view_garden', 'view_fireplace', 'view_student_allowed', 'view_pets_allowed', 'view_families_allowed', 'view_smokers_allowed', 'view_DSS_income_accepted', 'view_student_only', 'view_sq_ft']);
        
        $data['property_id'] = $propertyId;
        if($view == null){
            $view = new ViewProperty;
        }
        $data['view_postcode'] = $request->boolean('view_postcode');
        $data['view_address'] = $request->boolean('view_address');
        $data['view_location'] = $request->boolean('view_location');
        $data['view_property_type'] = $request->boolean('view_property_type');
        $data['view_address2'] = $request->boolean('view_address2');
        $data['view_bedroom'] = $request->boolean('view_bedroom');
        $data['view_bathroom'] = $request->boolean('view_bathroom');
        $data['view_address3'] = $request->boolean('view_address3');
        $data['view_furnished'] = $request->boolean('view_furnished');
        $data['view_city'] = $request->boolean('view_city');
        $data['view_price'] = $request->boolean('view_price');
        
        // Features
        $data['view_new_build'] = $request->boolean('view_new_build');
        $data['view_underfloor_heating'] = $request->boolean('view_underfloor_heating');
        $data['view_private_residents_lounge'] = $request->boolean('view_private_residents_lounge');
        $data['view_private_residents_terrace_garden'] = $request->boolean('view_private_residents_terrace_garden');
        $data['view_10_year_new_homes_warranty'] = $request->boolean('view_10_year_new_homes_warranty');
        $data['view_recently_renovated_throughout'] = $request->boolean('view_recently_renovated_throughout');
        $data['view_kitchen_diner'] = $request->boolean('view_kitchen_diner');
        $data['view_five_double_bedrooms'] = $request->boolean('view_five_double_bedrooms');
        $data['view_large_lounge'] = $request->boolean('view_large_lounge');
        
        if($request['property_status'] == 'rent') {
            $data['view_weekly_price'] = $request->boolean('view_weekly_price');
            $data['view_deposit'] = $request->boolean('view_deposit');
            $data['view_min_tenancy_length'] = $request->boolean('view_min_tenancy_length');
            $data['view_max_tenancy_length'] = $request->boolean('view_max_tenancy_length');
            $data['view_number_tenant'] = $request->boolean('view_number_tenant');
            $data['view_show_date'] = $request->boolean('view_show_date');
            $data['view_bill'] = $request->boolean('view_bill');
            $data['view_parking'] = $request->boolean('view_parking');
            $data['view_garden'] = $request->boolean('view_garden');
            $data['view_fireplace'] = $request->boolean('view_fireplace');
            $data['view_student_allowed'] = $request->boolean('view_student_allowed');
            $data['view_pets_allowed'] = $request->boolean('view_pets_allowed');
            $data['view_families_allowed'] = $request->boolean('view_families_allowed');
            $data['view_smokers_allowed'] = $request->boolean('view_smokers_allowed');
            $data['view_DSS_income_accepted'] = $request->boolean('view_DSS_income_accepted');
            $data['view_student_only'] = $request->boolean('view_student_only');
        }
        if($view->fill($data)->save()) {
            return true;
        }
        return false;
    }

    public function show($id)
    {
        $property = Property::find($id);
        $menu = 'property';
        if(!empty($property->extra_features)) {
            $property->extra_features = explode(",",$property->extra_features);
        }
        if(isset($property['show_date']) && !empty($property['show_date'])){
            $property['show_date'] = Carbon::createFromFormat('Y-m-d', $property['show_date'])->format('d/m/Y');
        }
        return view('admin.properties.show',compact('property','menu'));

    }

    public function map(Request $request) {
        $address = $request->address;
        $city = $request->city;
        $postcode = $request->postcode;
        return view('admin.properties.map',compact('address', 'city', 'postcode'));
    }

    public function change_status($id, Request $request)
    {
        $property = Property::find($id);
        if(DB::table('properties')->where('id', $id)->update(['confirmed' => !$property['confirmed']])){
            ActivityLogger::activity("The property status changed. ID: ".$property['id'].", new status: ".(!$property['confirmed'] ? 'active' : 'passive'));
            Session::flash('title','Success');
            Session::flash('message','The property ('.$id.') have been '.($property['confirmed'] ? 'passive': 'actived').' successfully.');
            Session::flash('type','success');
            
        }else {
            Session::flash('title','Error');
            Session::flash('message',"There is an error. Please try again!");
            Session::flash('type','error');
        }
        return redirect()->route('properties.index');
    }

}
