<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $user = Usuario::all();
    return view('index', compact('user')); 
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*return view('create');*/
        return view('vistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        /*$validated=$request->validate(
            ['nombre' => 'required|string|max:10']
        );
        //dd($validated);

        Usuario::create([
            'name' => $validated['nombre'],
            'email' => 'correo@gmail.com',
            'password' => '12345',
        ]);*/
        //$user = Usuario::create(['name' => 'Prueba', 'email' => 'prueba@example.com']);

        /*$validatedData = $request->validated();
        //dd($validatedData);
    
        // Crear un nuevo usuario
        $user = Usuario::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);
        
        // Verificar si el usuario fue creado
        if ($user) {
            return redirect()->route('usuario.index')->with('success', 'Usuario creado exitosamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }*/
        //dd($request->all());
        $validated= $request->validate(
            ['nombre' => 'required|string|max:10']
        );
        Usuario::create([
            'name' => $validated['nombre'],
            'email' =>  Str::random(10).'@gmail', //PARA QUE NO SEA REPETITIVO EL CORRECTO
            'password' => Hash::make("Hola123")
        ]);
        return view('vistas.list_users');
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

    public function list(){
        $usuarios = Usuario::paginate(4);
        #dd($usuarios);
        return view('vistas.list_users', compact('usuarios'));
    }
}
