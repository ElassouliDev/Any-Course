<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;


class NotificationsController extends BaseController
{

  function index($id){
      $notifications = auth()->user()->unreadNotifications()->orderBy('created_at','desc')->limit(3)->get();
      $data = '';

      foreach ($notifications as $notification)
    {
        if($notification->data['user_id'] == $id){
            $data = $notification;
            break;
        }
    }
      return response(['data'=>$data]);
  }
}
