<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller {

    public function index() {
        $user = $this->getUser();
        if (empty($user)) {
            return redirect()->route('login');
        }

        $isSuperAdmin = in_array('superadmin', $user['roles']);
        $isAdmin = in_array('admin', $user['roles']);
        $isUser  = in_array('user', $user['roles']);

        if ($isSuperAdmin) {
            return view('index.superadminDashboard');
        }

        if ($isAdmin) {
            return view('index.adminDashboard');
        }

        if ($isUser) {
            return view('index.userDashboard');
        }

        return view('index.index');
    }

    public function logout() {
        Session::forget('user');
        return redirect()->route('login');
    }
}
