<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Test;

class Member extends Controller
{
    public function checkStatus(Request $request){

        $this->validate($request, [
            'fbAccessToken' => 'required',
        ]);
        $user = Helper::getFacebookUser($request->get('fbAccessToken'));
            var_dump($user);exit;
    }

    public function test(){
      // 測試 queue

      dispatch(new Test())->delay(now()->addSeconds(10));
    }
}
