<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message_type','message_id', 'customer_id','property_id','customer_type','name','email','tel','text','readed_a','readed_c','deleted'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'message_id', 'id');
    }
}
