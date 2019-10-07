<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\NotificationDataTable;
use App\Http\Controllers\BaseController;


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
}
