<?php
namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client as HttpClient;

class IndexController extends Controller {

    public function index() {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('companies.index');
    }

    public function create() {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('companies.create');
    }

    public function edit($id) {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('companies.edit', ['id' => $id]);
    }

    public function myCompany() {
        $user = $this->getUser();
        if (empty($user)) {
            return redirect()->route('login');
        }

        $client = new HttpClient(['base_uri' => env('API_URL')]);
        $data = $client->request('GET', '/company', ['auth' => [$user['email'], $user['token']]]);
        $data = json_decode($data->getBody()->getContents(), true);
        $id = '0';

        if (!empty($data['data'])) {
            $id = $data['data'][0]['_id'];
        }

        return view('companies.view', ['id' => $id]);
    }

    public function getUsers($id) {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('companies.users', ['id' => $id]);
    }

    public function createUser($id) {
        if (empty($this->getUser())) {
            return redirect()->route('login');
        }
        return view('companies.users.create', ['id' => $id]);
    }

}
