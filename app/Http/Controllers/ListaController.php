<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\DB;


class ListaController extends Controller
{
    public function index(Request $request)
    {
        $cliente = DB::table('clientes')
        ->where('id', 'like', $request->id)
        ->get();
        return view('cliente.mostrarCliente')->with([
            'cliente' => $cliente
        ]);
    }
    public function show(Cliente $cliente)
    {
        $cliente = DB::table('clientes')
        ->where('id', '=', $cliente->id)
        ->get();
        return view('cliente.mostrarCliente')->with([
            'cliente' => $cliente
        ]);
    }
}
