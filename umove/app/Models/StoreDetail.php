<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreDetail extends Model
{
    use HasFactory;
    protected $fillable = ['store_name','logo','text','about_company_title','about_company','address', 'postcode', 'city', 'country', 'lng', 'lat', 'zoom', 'tel', 'email'];
}
