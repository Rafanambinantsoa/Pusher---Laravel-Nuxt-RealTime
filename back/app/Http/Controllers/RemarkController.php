<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Events\RemarkSubmitted;
use App\Models\Message;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function storeMessage(Request $request)
    {
        $message = Message::create([
            'content' => $request->input('content')
        ]);

        return response('Message created', 201);
    }

    public function messages()
    {
        return Message::all();
    }

    public function submit(Request $request)
    {
        $remarq = $request->input('remarq');
        // Insert the remark into the database
        Message::create([
            'content' => $remarq
        ]);
        broadcast(new MyEvent($remarq));
        return response([
            'message' =>  'success'
        ]);
    }
}
