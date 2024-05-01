<?php

namespace App\Observers;

use App\Models\Invite;
use App\Mail\RequestRegister;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class InviteObserver
{
    //
    public function creating(Invite $invite)
    {
        $invite->token = $this->generateToken();
    }

    public function created(Invite $invite)
    {
        //event(new NewInviteWasCreated($invite));
        //dd(new RequestRegister($invite));exit;
        Mail::to($invite['email'])->send(new RequestRegister($invite));
        event(new RequestRegister($invite));
    }

    protected function generateToken()
    {
        $token = Str::random(128);
        if(Invite::where('token', $token)->first()) {
            return $this->generateToken();
        }
        return $token;
    }
}
