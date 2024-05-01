<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'name',
        'email',
        'accepted',
        'accepted_at',
    ];

    public function getRouteKeyName()
    {
        return 'token';
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Roles::class);
    // }

    public function addNew($request)
    {
        $invite = $this->create($request->all());
        // if($request->has('roles')) {
        //     $invite->roles()->attach($request->roles);
        //     return $invite->load('roles');
        // }
        return $invite;
    }

    public function processInvited($request)
    {
        //$invited = $this->with('roles')->where('email', $request->email)->first();
        $invited = $this->where('email', $request->email)->first();
        if($invited) {
            $invited->update(['accpeted' => 1, 'accpeted_at' => \Carbon\Carbon::now()->toDateTimeString()]);
            $user = User::create([
                'name' => $invite->name,
                'email' => $invite->email,
                'password' => $request->password,
                'active' => 1,
            ]);
            // if($invited->roles) {
            //     $user->roles()->attach($invited->roles());
            // }
            return $user;
        }
        return abort('404', 'No invite was found');

    }
}
