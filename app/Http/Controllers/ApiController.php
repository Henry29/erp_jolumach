<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Exception;
use Throwable;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $numDoc = intval($request->numDoc);
        try {
            $endpoint = "http://localhost:8080/api/v1/dni/".$numDoc;
            $client = new Client();
            $value = "abcxyz";

            $response = $client->request('GET', $endpoint, ['query' => [
                'token' => $value
            ]]);

            $content = $response->getBody();
            
        } catch (Exception $e) {
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            die("error: " . $e->getMessage());
        }

        return $content;
    }
}
