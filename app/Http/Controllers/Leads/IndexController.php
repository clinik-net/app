<?php
namespace App\Http\Controllers\Leads;

use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function index() {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('leads.index');
    }

    public function create() {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('leads.create');
    }

    public function edit($id) {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('leads.edit', ['id' => $id]);
    }

    public function view($id) {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('leads.view', ['id' => $id]);
    }

}
