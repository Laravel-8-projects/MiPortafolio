<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proyectos\StoreRequest;
use App\Models\Fame;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyecto.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //dd($request);
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->input('nombre');

        $base64 = base64_encode(file_get_contents($request->file('imagen'))); //Convertimos la imagen que viene de la vista en base64
        $proyecto->imagen = 'data:image/png;base64,'.$base64; //Guardamos la imagen en la bdd convertida a base64


        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->url = $request->input('url');

        $resp = $proyecto->save();
        if($resp)
        {
            return redirect()->route('proyectos.index')
            ->with('success','Proyecto registrado.');
        }else{
            return response()->view('errors.404', [], 404);
        }


    }
    private function upload($image)
    {
        $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'images/proyecto';

        $rename = uniqid() . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return view('proyecto.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $input = $request->all();

        $proyecto->nombre = $request->input('nombre');
        //PARA EDITAR LA IMAGEN
        if ($request->file('imagen')) {
            $base64 = base64_encode(file_get_contents($request->file('imagen'))); //COnvierte la imagen del request en base64
            $url_image = 'data:image/png;base64,'.$base64; //Almacena link de la imagen en base64
            $proyecto->imagen = $url_image; //Inserta en la columna imagen la url en base64
            $input['imagen'] = "$url_image";
        }else{
            unset($input['imagen']);
        }
        //************ */
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->url = $request->input('url');

        $proyecto->update($input);

        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {

        $proyecto = Proyecto::find($proyecto->id);
        $proyecto->delete();
        return redirect()->back();
    }
}
