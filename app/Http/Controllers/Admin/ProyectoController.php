<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proyectos\StoreRequest;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
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

        $url_image = $this->upload($request->file('imagen'));
        $proyecto->imagen = $url_image;


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
            //Removemos la imagen que se va ha actualizar
            $proyecto = Proyecto::find($proyecto->id);
            unlink(public_path($proyecto -> imagen));
            //Ponemos la nueva imagen
            $url_image = $this->upload($request->file('imagen'));
            $proyecto->imagen = $url_image;
            $input['imagen'] = "$url_image";
        }else{
            unset($input['image_url']);
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
        unlink(public_path($proyecto->imagen));
        $proyecto->delete();
        return redirect()->back();
    }
}
