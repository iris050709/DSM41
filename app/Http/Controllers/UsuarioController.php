<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use GuzzleHttp\Psr7\Message;
use Illuminate\Container\Attributes\Log;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Usuario::all();
        $a = Usuario::find(1);
        return view('index', data: compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        return view('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view(view: 'edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        return view(view: 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        return view('destroy');
    }
}
