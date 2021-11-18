<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fame;

class FameController extends Controller
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
        $conocimientos = Fame::all(); //Trae todos los registros de la tabla
        return view('fame.index')->with('conocimientos',$conocimientos); //Envía los datos a la vista index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fame.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habilidad = new Fame();
        $base64 = base64_encode(file_get_contents($request->file('imagen')));


        $habilidad->imagen = 'data:image/png;base64,'.$base64;

        $habilidad->descripcion = $request->get('descripcion'); // EL get es lo mismo que el input

        $res = $habilidad->save();
        
        return redirect('/knowledges');

    }
    private function upload($image)
    {
        $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'images/habilidades';

        $rename = uniqid() . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habilidad = Fame::find($id);
        return view('fame.edit')->with('habilidad',$habilidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $fame = Fame::find($id);

        //PARA EDITAR LA IMAGEN DE PERFIL
        if ($request->file('imagen')) {
            $base64 = base64_encode(file_get_contents($request->file('imagen')));
            //Ponemos la nueva imagen
            $url_image = 'data:image/png;base64,'.$base64;
            $fame->imagen = $url_image;
            $input['imagen'] = "$url_image";
        }else{
            unset($input['image_url']);
        }
        //************ */
        $fame->descripcion = $request->input('descripcion');
        $fame->update($input);
        return redirect()->route('knowledges.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fame = Fame::find($id);
        $fame->delete();
        return redirect()->back();
    }
}
