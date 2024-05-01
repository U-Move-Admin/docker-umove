<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewProperty extends Model
{
    use HasFactory;
    protected $fillable = [
    'property_id','view_postcode','view_address', 'view_location', 'view_property_type','view_address2', 'view_bedroom', 'view_bathroom', 'view_address3', 'view_furnished', 'view_city', 'view_weekly_price', 'view_price',
    'view_new_build','view_kitchen_diner','view_underfloor_heating', 'view_private_residents_lounge', 'view_private_residents_terrace_garden', 'view_10_year_new_homes_warranty', 'view_recently_renovated_throughout', 'view_five_double_bedrooms', 'view_large_lounge',
    'view_deposit', 'view_min_tenancy_length', 'view_max_tenancy_length', 'view_number_tenant', 'view_show_date', 'view_bill', 'view_parking', 'view_garden', 'view_fireplace', 'view_student_allowed', 'view_pets_allowed', 'view_families_allowed', 'view_smokers_allowed', 
    'view_DSS_income_accepted', 'view_student_only', 'view_sq_ft'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
