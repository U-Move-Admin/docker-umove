<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageSent;

class MessageController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:message-list|message-create|message-edit|message-delete', ['only' => ['index','store']]);
         $this->middleware('permission:message-action', ['only' => ['edit','update']]);
         $this->middleware('permission:message-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = Message::where('deleted',0)
            ->where('message_type', 'send')
            ->orderBy('created_at','asc')->with('property')->get();
        return view('admin.messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        $message_id = $id;
        if($message['message_id']) {
            $message_id = $message['message_id'];
        }
        Message::where('id', $message_id)->orWhere('message_id', $message_id)->update(['readed_a' => true]);
        $messages = Message::where('id', $message_id)
            //->where('message_type', 'reply')
            ->where('deleted',0)->orderBy('created_at')->with('property','messages')->first();
        return view('admin.messages.show',compact('message','messages','message_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        $messages = Message::where('property_id', $message['property_id'])->where('email', $message['email'])
            //->where('message_type', 'reply')
            ->where('deleted',0)->orderBy('created_at')->with('property')->get()->toArray();
        return $messages;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $data = $request->all();
        $data['text'] = $data['reply'];
        $data['property_id'] = $message['property_id'];
        $data['customer_id'] = $message['customer_id'];
        $data['email'] = $message['email'];
        $data['tel'] = $message['tel'];
        $data['name'] = 'You';
        $data['message_id'] = $message['message_id'] ? $message['message_id'] : $message['id'];
        $data['message_type'] = 'reply';
        $new_message = new Message;
        if($new_message->fill($data)->save()){
            $date = Carbon::parse($new_message['created_at'])->isoFormat('D-MM-YYYY');
            $mail['name'] = $message['name'];
            $mail['subject'] = 'You have a new message from '.config('app.name');
            $mail['message'] = $data['text'].'';
            Mail::to($message['email'])->send(new MessageSent($mail));
            return response()->json(['name' => $data['name'],'text' => $data['text'], 'message_type'=> $data['message_type'], 'date'=> $date ], 200);

        } else {
            return response()->json('error', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
