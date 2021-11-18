<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\Http\Request;

class ExtrasController extends Controller
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
        $extras = Extra::all();
        return view('Extras.index')->with('extras',$extras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Extras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extra = new Extra();

        $base64 = base64_encode(file_get_contents($request->file('foto'))); //Convierte la imagen que viene de la vista en base64
        $extra->foto = 'data:image/png;base64,'.$base64; //Guarda la imagen en la bdd convertida a base64

        $extra->conocimientos = $request->input('conocimientos');

        $extra->acercade = $request->input('acercade');

        $resp = $extra->save();
        if($resp)
        {
            return redirect()->route('extras.index')
            ->with('success','Proyecto registrado.');
        }else{
            return response()->view('errors.404', [], 404);
        }
    }

    private function upload($image)
    {
        $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'images/extras';

        $rename = uniqid() . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function edit(Extra $extra)
    {
        return view('Extras.edit', compact('extra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $extra = Extra::find($id);

        //PARA EDITAR LA IMAGEN DE PERFIL
        if ($request->file('foto')) {

            $base64 = base64_encode(file_get_contents($request->file('foto'))); //COnvierte la imagen del request en base64
            $url_image = 'data:image/png;base64,'.$base64; //Almacena link de la imagen en base64
            $extra->foto = $url_image; //Inserta en la columna imagen la url en base64
            $input['foto'] = "$url_image";
           
        }else{
            unset($input['foto']);
        }
        //************ */
        $extra->conocimientos = $request->input('conocimientos');
        $extra->acercade = $request->input('acercade');

        $extra->update($input);

        return redirect()->route('extras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extra $extra)
    {
        $extra = Extra::find($extra->id);
        $extra->delete();
        return redirect()->back();
    }
}
