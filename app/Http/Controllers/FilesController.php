<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Muestra la lista de los archivos subidos por los usuarios.
    public function index(Request $request) 
    {
        if ($request) {
            $query = trim($request->get('search'));

            //$files= File::where('name', 'LIKE', '%' . $query . '%')->orderBy('id', 'asc')->simplePaginate(10);
            $files = File::where('user_id', Auth::id())->latest()->get();
            
            return view('files.index', ['files' => $files, 'search' => $query]);
        }
    }

    //Muestra la vista para crear un archivo.
    public function create() 
    {
        return view('files.create');
    }

    //Guarda el archivo en la DB.
    public function store(Request $request) 
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->file('files');
        $user_id = Auth::id();

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

    }

    //Muestra el archivo seleccionado.
    public function show($id)
    {
        $file = File::whereId($id)->firstOrFail();
        $user_id = Auth::id();

        if($file->user_id == $user_id) {
            return redirect('/storage' . '/'. $user_id . '/' . $file->name);
        } else {
            Alert::success('¡Error! ', 'No tienes permisos para ver este archivo');
            return back();
        }
    }

    //Descarga el archivo seleccionado.
    public function download($id)
    {
        $file = File::whereId($id)->firstOrFail();
        $user_id = Auth::id();
        $pathToFile = storage_path("app/public". '/'. $user_id . '/' . $file->name);
        return response()->download($pathToFile);
    }

    //Elimina el archivo seleccionado.
    public function destroy(Request $request, $id)
    {
        //Obtiene el archivo a eliminar
        $file = File::whereId($id)->firstOrFail();

        //Borra el archivo del almacenamiento
        unlink(public_path('storage' . '/' . Auth::id() . '/' . $file->name));

        //Borra el registro de la BD
        $file->delete();

        Alert::info('¡Atención! ', 'Se ha eliminado el archivo');
        return back();
    }
}
