<?php

namespace App\Http\Controllers;

use App\Events\RemarkSubmitted;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function submit(Request $request)
    {
        // $remarq = $request->input('remarq');
        event(new RemarkSubmitted("fsdkjfhsdkfj"));

        return response([
            'message' =>  'success'
        ]);
    }
}
