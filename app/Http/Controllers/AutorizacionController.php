<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AutorizacionController extends Controller
{
    //
    public function login(Request $req) {
        //$datos = $req->input();
        //dd($datos);
        //die();
        //$param_Arr = json_decode($req->input('json', null), true);
       //$JwtAuth = new \JwtAuth();
        //$email = $param_Arr['email'];
        //$password = hash('sha256', $param_Arr['password']);
        //return response()->json($JwtAuth->signup($email, $password, null));

        return  redirect('principal');
    }
}
