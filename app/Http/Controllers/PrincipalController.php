<?php

namespace App\Http\Controllers;
use App\Http\Resources\User;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrincipalController extends Controller
{
    public function index()
    {
        $resp= Http::get('https://reqres.in/api/users?page=1');
        $datos = $resp->json();
        $data =  $datos['data'];
        rsort($data);
        // var_dump($data);
        // die();
        // return  new UserCollection($data);
        // // return new  User($datos['data']);

        // // $data= new  User($datos);
        // // dd($data);
        // // $data =  $data['0']->data;
        // // dd($data );
        //    die();
        return view('principal', compact('data'));
    }
    public function filtro(Request $request)
    {
        $resp= Http::get('https://reqres.in/api/users?page=1');
        $datos = $resp->json();
        $data =  $datos['data'];
        $orden= $request->input('orden');
        $filtro= $request->input('buscar');
        if($orden == 'asc') {
            sort($data);
        } else {
            rsort($data);
        }
        return view('principal', compact('data'));
    }

}
