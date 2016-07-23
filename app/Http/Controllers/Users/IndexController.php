<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function index() {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('users.index');
    }

    public function edit($id) {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }

        $referer = $_SERVER['HTTP_REFERER'];
        $protocol = 'http://';
        if (!empty($_SERVER['HTTPS'])) $protocol = 'https://';
        $host = $protocol . $_SERVER['HTTP_HOST'];
        $referer = str_replace($host, '', $referer);
        return view('users.edit', ['id' => $id, 'referer' => $referer]);
    }

}
