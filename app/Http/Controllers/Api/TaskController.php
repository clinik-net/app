<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        try {
            $data = $request->getContent();
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('POST', '/task', [
                'auth' => [$user['email'], $user['token']],
                'body' => $data,
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);
            $data = json_decode($data->getBody()->getContents(), true);
        } catch (ServerException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        } catch (ClientException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        }

        return response()->json($data)->setStatusCode($data['code']);
    }
}