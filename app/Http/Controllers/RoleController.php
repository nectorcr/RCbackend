<?php

namespace App\Http\Controllers;

use App\Role;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Muestra todos los roles en la vista.
    public function index()
    {
        $roles = Role::all();
        
        return view('roles.index', ['roles' => $roles]);
    }

    //Crea un nuevo rol.
    public function create()
    {
        $role = new Role();
        $role->name = request('name');

        $role->save();

        return redirect('roles');
    }

    //Guarda un nuevo rol en la DB.
    public function store(UserFormRequest $request)
    {
        $role = new Role();
        $role->name = $request->get('name');

        $role->save();

        return redirect('roles');
    }
}
