<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Http\Request; 

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Muestra la lista de todos los usuarios creados.
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
 
            $users= User::where('name', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->simplePaginate(10);

            return view('usuarios.index', ['users' => $users, 'search' => $query]);
        }
    }

    //Muestra todos los roles creados.
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', ['roles' => $roles]);
    }

    //Guarda todos los datos del usuario creado en la DB.
    public function store(UserFormRequest $request)
    {
        $usuario = new User();

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));

        $usuario->save();

        $usuario->asignarRol($request->get('rol'));

        return redirect('/usuarios');
    }

    //Muestra la información del usuario seleccionado.
    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]);   
    }

    //Muestra la vista con todos los datos a actualizar del usuario seleccionado.
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.edit', ['user' => $user, 'roles' => $roles]);
    }

    //Actualiza los datos de un usuario en la DB.
    public function update(UserEditFormRequest $request, $id)
    {
        $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]);
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

        $pass = $request->get('password');
        if($pass != null) {
            $usuario->password = bcrypt($request->get('password'));
        } else {
            unset($usuario->password);
        }

        $role = $usuario->roles;
        if(count($role) > 0) {
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        }  else {
            $role_id = $request->get('rol');
            User::find($id)->roles()->sync($request->input('rol', []));
        }

        $usuario->update();

        return redirect('/usuarios');
    }

    //Elimina un usuario seleccionado.
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/usuarios');
    }
}
