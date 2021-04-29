<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Test;
use App\Member as AppMember;

class Member extends Controller
{
  public function checkStatus(Request $request)
  {

    $this->validate($request, [
      'fbAccessToken' => 'required',
    ]);
    $user = Helper::getFacebookUser($request->get('fbAccessToken'));
    var_dump($user);
    exit;
  }

  public function test()
  {
    // 測試 queue

    dispatch(new Test())->delay(now()->addSeconds(10));
  }

  public function testUser()
  {
    AppMember::create([
      'id' => 'test',
      'name' => 'test',
      'picture' => Helper::getPictureUrl('4'),
      'email' => 'test@test.com'
    ]);
  }
}
