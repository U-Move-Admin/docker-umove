<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'email', 'tel', 'address', 'postcode', 'city', 'country'];

    public function properties()
    {
        return $this->hasMany(Message::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
