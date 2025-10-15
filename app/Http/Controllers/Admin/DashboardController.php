<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\Admin\BasicSettingsProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\PushNotifications\PushNotifications;
use App\Models\Admin\AdminNotification;
use App\Constants\NotificationConst;
use App\Http\Helpers\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title = "Dashboard";

        if(!in_array($request->route()->getName(), auth_admin_permissions()) && !auth_is_super_admin()){
            return view('admin.sections.dashboard.demo',compact(
                'page_title',
            ));
        }

        return view('admin.sections.dashboard.index',compact(
            'page_title',
        ));
    }

    /**
     * Logout Admin From Dashboard
     * @return view
     */
    public function logout(Request $request) {

        $admin = auth()->user();
        pusher_unsubscribe("admin", $admin->id);

        try{
            $admin->update([
                'last_logged_out'   => now(),
                'login_status'      => false,
            ]);
        }catch(Exception $e) {
            // Handle Error
        }

        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Function for clear admin notification
     */
    public function notificationsClear() {
        $admin = auth()->user();

        if(!$admin) {
            return false;
        }

        try{
            $admin->update([
                'notification_clear_at'     => now(),
            ]);
        }catch(Exception $e) {
            $error = ['error' => ['Something went wrong! Please try again.']];
            return Response::error($error,null,404);
        }

        $success = ['success' => ['Notifications clear successfully!']];
        return Response::success($success,null,200);
    }
}
