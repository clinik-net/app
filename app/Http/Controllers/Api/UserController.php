<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(Request $request)
    {
        try {
            $data = $request->getContent();
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('POST', '/user', [
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

    public function remove(Request $request, $id)
    {
        try {
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('DELETE', '/user/' . $id, [
                'auth' => [$user['email'], $user['token']],
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

    public function get(Request $request, $id)
    {
        try {
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('GET', '/user/' . $id, [
                'auth' => [$user['email'], $user['token']],
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

    public function getList(Request $request)
    {
        try {
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('GET', '/user', [
                'auth' => [$user['email'], $user['token']],
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

    public function update(Request $request, $id)
    {
        try {
            $data = $request->getContent();
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('PUT', '/user/' . $id, [
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

    public function current(Request $request)
    {
        try {
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('GET', '/me', [
                'auth' => [$user['email'], $user['token']],
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