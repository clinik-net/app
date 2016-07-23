<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Session;

class TaskTypeController extends Controller
{

    public function getList(Request $request)
    {
        try {
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $url = '/task-type?';

            if ($request->input('public', null) !== null) {
                $url .= 'public=' . $request->input('public');
            }

            $data = $client->request('GET', $url, ['auth' => [$user['email'], $user['token']]]);
            $data = json_decode($data->getBody()->getContents(), true);
        } catch (ServerException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        } catch (ClientException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        }

        return response()->json($data)->setStatusCode($data['code']);
    }
}