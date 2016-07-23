<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{

    public function getList(Request $request)
    {
        try {
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('GET', '/company', ['auth' => [$user['email'], $user['token']]]);
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
            $data = $client->request('GET', '/company/' . $id, ['auth' => [$user['email'], $user['token']]]);
            $data = json_decode($data->getBody()->getContents(), true);
        } catch (ServerException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        } catch (ClientException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        }

        return response()->json($data)->setStatusCode($data['code']);
    }

    public function create(Request $request)
    {
        try {
            $data = $request->getContent();
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('POST', '/company', [
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

    public function update(Request $request, $id)
    {
        try {
            $data = $request->getContent();
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('PUT', '/company/' . $id, [
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
            $data = $client->request('DELETE', '/company/' . $id, [
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

    public function getUsers(Request $request, $id)
    {
        try {
            $user = Session::get('user');
            $client = new HttpClient(['base_uri' => env('API_URL')]);
            $data = $client->request('GET', '/company/' . $id . '/users', ['auth' => [$user['email'], $user['token']]]);
            $data = json_decode($data->getBody()->getContents(), true);
        } catch (ServerException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        } catch (ClientException $e) {
            $data = json_decode($e->getResponse()->getBody(), true);
        }

        return response()->json($data)->setStatusCode($data['code']);
    }
}