<?php


namespace App\Http\Controllers;

use App\Models\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'descripcion' => 'required',
        ]);

        // Crear el nuevo usuario con los datos validados
        Usuario::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'descripcion' => $request->input('descripcion'),
            // Asegúrate de que los nombres de campo coincidan con tu base de datos
        ]);

        // Redirigir a alguna vista después de crear el usuario
        return redirect()->route('usuarios.index')
            ->withSuccess('Se ha creado un nuevo Usuario correctamente.');
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'descripcion' => 'required|unique:usuarios,descripcion,' . $id,
            // Puedes agregar más reglas de validación según tus necesidades
        ]);

        // Buscar el usuario a actualizar
        $usuario = Usuario::findOrFail($id);

        // Actualizar los datos del usuario
        $usuario->nombre = $request->input('nombre');
        $usuario->email = $request->input('email');
        $usuario->descripcion = $request->input('descripcion');
        // Asegúrate de que el nombre de campo coincida con tu base de datos

        // Guardar los cambios en la base de datos
        $usuario->save();

        // Redirigir a alguna vista después de actualizar el usuario
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }


    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Eliminar el usuario
        $usuario->delete();

        // Redirigir al usuario a la página correcta después de eliminar el usuario
        return redirect()->route('usuarios.index')
            ->with('success', 'El usuario ha sido eliminado correctamente.');
    }
}
