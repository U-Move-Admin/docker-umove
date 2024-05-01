<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['is_owner', 'customer_id','user_id', 'furl','advert_type', 'property_status','property_type', 'price', 'weekly_price', 
    'new_build', 'underfloor_heating', 'private_residents_lounge', 'private_residents_terrace_garden', '10_year_new_homes_warranty', 'recently_renovated_throughout', 'kitchen_diner', 'five_double_bedrooms','large_lounge','extra_features',
    'deposit', 'description', 'city', 'postcode', 'address', 'address2', 'address3','lat','lng','zoom', 'bedroom', 'bathroom', 'furnished', 'min_tenancy_length', 'max_tenancy_length', 'number_tenant', 'show_date', 'current_user', 'pets_allowed', 'DSS_income_accepted', 'smokers_allowed', 'student_allowed', 'families_allowed', 'garden', 'bill', 'is_photo', 'confirmed','note', 'let_sold', 'sq_ft'];

    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('sort');
    }

    public function scopeFilter($query,$filters)
    {
        if(isset($filters['title']) && !empty($filters['title'])){
            if(is_numeric($filters['title'])){
                $query = $query->whereRaw(
                    "properties.id = " .$filters['title']
                );  
            }else{
                $words = explode(' ',$filters['title']);
                foreach($words as $k=> $data){
                    $queryTitle =  "(
                        properties.title LIKE '%" .$data."%' OR 
                        properties.description LIKE '%" . $data."%' OR 
                        properties.property_status LIKE '%" . $data."%' OR 
                        properties.price LIKE '%" . $data."%' OR 
                        properties.bedroom LIKE '%" . $data."%' OR 
                        properties.bathroom LIKE '%" . $data."%' OR 
                        properties.city LIKE '%".$data."%' OR
                        properties.address LIKE '%".$data."%'
                    )";
                }
                $query =  $query->whereRaw("(".$queryTitle.")");
            }
            
        }
        if(isset($filters['word']) && !empty($filters['word'])){
            if(is_numeric($filters['word'])){
                $query =  $query->where("properties.id",$filters['word']);  
            }else{
                $words = explode(' ',$filters['word']);
                foreach($words as $k=> $data){
                    $queryTitle =  "(
                        properties.title LIKE '%" .$data."%' OR 
                        properties.description LIKE '%" . $data."%' OR 
                        properties.property_status LIKE '%" . $data."%'
                    )";
                }
                $query =  $query->whereRaw($queryTitle);
            }
            
        }
        if(isset($filters['property_status']) && !empty($filters['property_status'])){
            $query =  $query->where('properties.property_status', $filters['property_status'] );
        } 
        if(isset($filters['property_type']) && !empty($filters['property_type'])){
            $query =  $query->where('properties.property_type', $filters['property_type'] );
        } 
        // if(isset($filters['property_type']) && !empty($filters['property_type'])){
        //     $query =  $query->where('properties.property_type',$filters['property_type'] );
        //     if($filters['property_type'] == 'konut' || $filters['property_type'] == 'devremulk'){
        //         //konut - devremulk
        //         if(isset($filters['housing_type']) && !empty($filters['housing_type'])){
        //             $filters['housing_type'] = str_replace('_',' ',$filters['housing_type']);
        //             //$query =  $query->whereRaw('FIND_IN_SET(housing_details.`housing_type`,"'.$filters['housing_type'].'")');
        //             $query =  $query->whereIn('housing_details.housing_type',explode(',',$filters['housing_type']));
        //         }
        //         if(isset($filters['residential']) && !empty($filters['residential'])){
        //             $filters['residential'] = str_replace('_',' ',$filters['residential']);
        //             $query =  $query->where('housing_details.residential',$filters['residential'] );
        //         }
        //         if(isset($filters['min_square_meter']) && !empty($filters['min_square_meter'])){
        //             $filters['min_square_meter'] = str_replace('.','',$filters['min_square_meter']);
        //             $query =  $query->where('housing_details.square_meter','>=',$filters['min_square_meter'] );
        //         }
        //         if(isset($filters['max_square_meter']) && !empty($filters['max_square_meter'])){
        //             $filters['max_square_meter'] = str_replace('.','',$filters['max_square_meter']);
        //             $query =  $query->where('housing_details.square_meter','<=',$filters['max_square_meter'] );
        //         }
        //         if(isset($filters['room_number']) && !empty($filters['room_number'])){
        //             $room = '';
        //             foreach(explode(',',$filters['room_number']) as $k => $oda_sayisi){
        //                 $arr = explode('+', config('home.oda_sayisi.'.$oda_sayisi));
        //                 $room .=  ($k == 0 ? '' : ' OR ').'( housing_details.room_number='.$arr[0].' AND housing_details.living_room_number='.$arr[1].') '; 
        //             }
        //             $query =  $query->whereRaw('('.$room.')');
        //         }
        //         if(isset($filters['other']) && !empty($filters['other'])){
        //             $query =  $query->where('properties.other_features','like','%'.$filters['other'].'%' );
        //         }
        //     }else if($filters['property_type'] == 'isyeri' || $filters['property_type'] == 'bina'){
        //         //isyeri_bina
        //         if(isset($filters['workplace_type']) && !empty($filters['workplace_type'])){
        //             $query =  $query->whereIn('workplace_details.workplace_type',explode(',',$filters['workplace_type']));
        //         }
        //         if(isset($filters['min_square_meter']) && !empty($filters['min_square_meter'])){
        //             $filters['min_square_meter'] = str_replace('.','',$filters['min_square_meter']);
        //             $query =  $query->where('workplace_details.square_meter','>=',$filters['min_square_meter'] );
        //         }
        //         if(isset($filters['max_square_meter']) && !empty($filters['max_square_meter'])){
        //             $filters['max_square_meter'] = str_replace('.','',$filters['max_square_meter']);
        //             $query =  $query->where('workplace_details.square_meter','<=',$filters['max_square_meter'] );
        //         }
        //     }else if($filters['property_type'] == 'arsa' || $filters['property_type'] == 'arazi'){
        //         //arsa arazi
        //         if(isset($filters['land_type']) && !empty($filters['land_type'])){
        //             $query =  $query->whereIn('land_details.land_type',explode(',',$filters['land_type']));
        //         }
        //         if(isset($filters['min_square_meter']) && !empty($filters['min_square_meter'])){
        //             $filters['min_square_meter'] = str_replace('.','',$filters['min_square_meter']);
        //             $query =  $query->where('land_details.square_meter','>=',$filters['min_square_meter'] );
        //         }
        //         if(isset($filters['max_square_meter']) && !empty($filters['max_square_meter'])){
        //             $filters['max_square_meter'] = str_replace('.','',$filters['max_square_meter']);
        //             $query =  $query->where('land_details.square_meter','<=',$filters['max_square_meter'] );
        //         }
        //     }else if($filters['property_type'] == 'turistik-tesis'){
        //         //tesis
        //         if(isset($filters['facility_type']) && !empty($filters['facility_type'])){
        //             $query =  $query->whereIn('facility_details.facility_type',explode(',',$filters['facility_type']));
        //         }
        //     }
        // }
        if(isset($filters['min_price']) && !empty($filters['min_price'])){
            $query =  $query->where('properties.price','>=',str_replace('.','',$filters['min_price']));
        }  
        if(isset($filters['max_price']) && !empty($filters['max_price'])){
            $query =  $query->where('properties.price','<=',str_replace('.','',$filters['max_price']));
        }
        if(isset($filters['min_sq_ft']) && !empty($filters['min_sq_ft'])){
            $query =  $query->where('properties.sq_ft','>=',str_replace('.','',$filters['min_sq_ft']));
        }  
        if(isset($filters['max_sq_ft']) && !empty($filters['max_sq_ft'])){
            $query =  $query->where('properties.sq_ft','<=',str_replace('.','',$filters['max_sq_ft']));
        }
        // if(isset($filters['min_price']) || isset($filters['max_price'])){
        //     if(!isset($filters['price_unit'])) $filters['price_unit'] = 'GBP';
        //     $query =  $query->where('properties.price_unit',$filters['price_unit']);
        // }
        if(isset($filters['city']) || !empty($filters['city'])){
            $query = $query->where('properties.city',$filters['city']);
        }
        if(isset($filters['bedroom']) || !empty($filters['bedroom'])){
            $query = $query->where('properties.bedroom',$filters['bedroom']);
        }
        if(isset($filters['bathroom']) || !empty($filters['bathroom'])){
            $query = $query->where('properties.bathroom',$filters['bathroom']);
        }
        if(isset($filters['address']) || !empty($filters['address'])){
            $query = $query->whereIn('properties.address',explode(',',$filters['address']));
        }
        if(isset($filters['user_id']) || !empty($filters['user_id'])){
            $query = $query->where('properties.user_id',$filters['user_id']);
        }
        return $query;
    }
    
    public function view_property()
    {
        return $this->hasOne(ViewProperty::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
