<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\NotificationDataTable;
use App\Http\Controllers\BaseController;
use App\Http\Requests\SendNotificationToAllUserRequest;
use App\Notifications\SendNotificationOfAllUser;
use App\Notifications\SendNotificationToAllUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class NotificationsController extends BaseController
{

    function index_by($id)
    {
        $notifications = auth()->user()->unreadNotifications()->orderBy('created_at', 'desc')->limit(3)->get();
        $data = '';

        foreach ($notifications as $notification) {
            if ($notification->data['user_id'] == $id) {
                $data = $notification;
                break;
            }

        }
        return response(['data' => $data]);
    }

    function index(NotificationDataTable $notification)
    {
        return $notification->render('dashboard.notification.index', ['title' => trans('admin.notifications')]);

    }
    function edit($id)
    {
        \auth()->user()->unreadNotifications()->where('read_at',null)->where('id',$id)->update(['read_at' => now()]);
        return back();
    }
    function create()
    {
        $title = trans('admin.create');
        return view('dashboard.notification.create',compact('title'));
    }


    public function store(SendNotificationToAllUserRequest $request)
    {
    $users = User::where('id' ,'<>',auth()->id())->get();
//    dd($request->all());
        Notification::send($users, new SendNotificationToAllUser($request->all()));

        session()->flash('success', __('error.added_successfully'));

        return back();

    }
}
