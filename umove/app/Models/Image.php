<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['property_id','image_name','sort'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    
}
