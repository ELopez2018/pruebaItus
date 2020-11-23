<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResources;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// Clase Principal
class PrincipalController extends Controller
{
    public function index()
    {
        $data = [];
        return view('principal', compact('data'));
    }
    // Funcion para filtrar los datos de la consulta  a la API
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
        return view('principal', compact('data'));
    }

    // Funcion para ejecutar querys a la Tablas
    public function query(Request $request)
    {
        $consulta= $request->input();
        if($consulta['buscar']=='' || is_null($consulta['buscar'])) {
            if($consulta['orden']=='asc') {
                $data = User::where('email', '<>', null)
                ->orderBy('id', 'asc')
                ->paginate(5);
            } else {
                $data = User::where('email', '<>', null)
                ->orderBy('id', 'desc')
                ->paginate(5);
            }
        } else {
            if($consulta['orden']=='asc') {
                $data = User::where('email', 'like', '%' . $consulta['buscar'] . '%')
                ->orderBy('id', 'asc')
                ->paginate(5);
            } else {
                $data = User::where('email', 'like', '%' . $consulta['buscar'] . '%')
                ->orderBy('id', 'desc')
                ->paginate(5);
            }

        }
        return view('principal2', compact('data'));
    }

    // Funcion para Resetar las querys
    public function reset() {
        $data = User::where('email', '=', 'maito')
        ->orderBy('id', 'asc')
        ->paginate(5);;
        return view('principal2', compact('data'));

    }
    // Funcion para buscar por columna
    public function busqueda(Request $request) {
        $data = $request->input();
        $key = array_keys($data);
        $data = User::where($key[0], 'like', '%' . $data[ $key[0] ] . '%')
        ->orderBy('id', 'asc')
        ->paginate(5);
        return view('principal2', compact('data'));

    }
    public function inicio() {
        $data = User::where('email', '=', 'maito')
        ->orderBy('id', 'asc')
        ->paginate(5);
        return view('principal2', compact('data'));
    }

}
