<?php
namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }

        return view('profile.index');
    }
}