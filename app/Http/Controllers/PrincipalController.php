<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResources;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class PrincipalController extends Controller
{
    public $filtro = '';
    public function index()
    {
        $resp = Http::get('https://reqres.in/api/users?page=1');
        $datos = $resp->json();
        $data = [];
        // rsort($data);
        return view('principal', compact('data'));
    }
    public function filtro(Request $request)
    {
        $resp = Http::get('https://reqres.in/api/users?page=1');
        $datos = $resp->json();
        $data =  $datos['data'];
        $orden = $request->input('orden');
        $filtro = $request->input('buscar');
        $filtrado = '';

        if ($filtro !== '' && !is_null($filtro)) {
            foreach ($data as  $valor) {
                if ($valor['email'] === $filtro) {
                    $filtrado = Arr::add([$valor], null, null);
                }
            }
            $data = $filtrado;
        }
        if ($orden == 'asc') {
            sort($data);
        } else {
            rsort($data);
        }
        // return  redirect()->route('principal', compact('data'));
        return view('principal', compact('data'));
    }

    public function query()
    {
        $data = DB::table('users')->paginate(5);
        $data = User::where('email', '<>', null)->paginate(5);
        // dd($data);
        // die();
        // return $data;
        //return view('principal2', ['data' => $data]);
        return view('principal2', compact('data'));
    }
}
