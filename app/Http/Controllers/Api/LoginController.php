<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function login(Request $request) {
        $email = $request->get('email', null);
        $password = $request->get('password', null);
        $client = new HttpClient(['base_uri' => env('API_URL')]);
        $token = $client->request('GET', '/token', ['auth' => [$email, $password]]);
        $token = json_decode($token->getBody()->getContents(), true);

        if ($token['code'] === 200) {
            Session::put('user', $token['data']);
        }

        return response()->json($token)->setStatusCode($token['code']);
    }

}
