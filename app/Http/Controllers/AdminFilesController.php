<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use App\Role;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminFilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Muestra la lista de archivos de los usuarios.
    public function index(Request $request) 
    {
        if ($request) {
            $query = trim($request->get('search'));

            //$files= File::where('name', 'LIKE', '%' . $query . '%')->orderBy('id', 'asc')->simplePaginate(10);
            $files = File::all();
            
            return view('filesadmin.index', ['files' => $files, 'search' => $query]);
        }
    }

    //Crea el archivo asociandolo con el usuario seleccionado.
    public function create() 
    {
        $files = File::class;

        $relacionEloquent = 'roles'; //Nombre de tu relacion con roles en el modelo User

        $users = User::whereHas($relacionEloquent, function ($query) {
            return $query->where('name', '=', 'cliente');
        })->get();
        
        return view('filesadmin.create', ['files' => $files, 'users' => $users, 'relacionEloquent' => $relacionEloquent]);
    }

    //Guarda el archivo y lo asocia al usuario seleccionado en la DB.
    public function store(UserFormRequest $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->file('files');
        $user_id = $request->get('users');

        if($request->hasFile('files')) {
            foreach ($files as $file) {
                $fileName = Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                if(Storage::putFileAs('/public/' . $user_id . '/', $file, $fileName)) {
                    File::create([
                        'name' => $fileName,
                        'user_id' => $user_id
                    ]);
                }
            }
            Alert::success('¡Éxito!', 'Se ha subido el archivo');
            return back();

        } else {
            Alert::success('¡Error!', 'Debes subir uno o mas archivos');
            return back();
        }

        return redirect()->route('filesadmin.index');
    }

    //Muestra el archivo seleccionado.
    public function show($id)
    {
        $file = File::whereId($id)->firstOrFail();

        //if($file->user_id == $user_id) {
        //    return redirect('/storage' . '/'. $user_id . '/' . $file->name);
        //} else {
        //    Alert::success('¡Error! ', 'No tienes permisos para ver este archivo');
        //    return back();
        //}
        return redirect('/storage' . '/'. $file->user_id . '/' . $file->name);
    }

    //Descarga el archivo seleccionado.
    public function download($id)
    {
        $file = File::whereId($id)->firstOrFail();
        $pathToFile = storage_path("app/public". '/'. $file->user_id . '/' . $file->name);
        return response()->download($pathToFile);
    }

    //Elimina el archivo seleccionado.
    public function destroy(Request $request, $id)
    {
        //Obtiene el archivo a eliminar
        $file = File::whereId($id)->firstOrFail();

        //Borra el archivo del almacenamiento
        unlink(public_path('storage' . '/' . $file->user_id . '/' . $file->name));

        //Borra el registro de la BD
        $file->delete();

        Alert::info('¡Atención! ', 'Se ha eliminado el archivo');
        return back();
    }
}