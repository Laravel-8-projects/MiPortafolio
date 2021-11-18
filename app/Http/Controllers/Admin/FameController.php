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
        $habilidad = new Fame(); // Instanciamos un nuevo objeto
        
        $base64 = base64_encode(file_get_contents($request->file('imagen'))); //Convertimos la imagen que viene de la vista en base64
        $habilidad->imagen = 'data:image/png;base64,'.$base64; //Guardamos la imagen en la bdd convertida a base64

        $habilidad->descripcion = $request->get('descripcion'); // EL get es lo mismo que el input

        $habilidad->save(); // Guardamos en la bdd
        
        return redirect('/knowledges'); // Redirecciona a a vista knowledges

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
        $input = $request->all();//Captura toda la data ingresada en el form
        $fame = Fame::find($id); // Busca la data con el id solicitado

        //PARA EDITAR LA IMAGEN DE PERFIL
        if ($request->file('imagen')) {
            $base64 = base64_encode(file_get_contents($request->file('imagen'))); //COnvierte la imagen del request en base64
            $url_image = 'data:image/png;base64,'.$base64; //Almacena link de la imagen en base64
            $fame->imagen = $url_image; //Inserta en la columna imagen la url en base64
            $input['imagen'] = "$url_image";
        }else{
            unset($input['image_url']);
        }
        //************ */
        $fame->descripcion = $request->input('descripcion');//Toma la descripcion del request
        $fame->update($input); //Actualiza todo el input
        return redirect()->route('knowledges.index');//Redirecciona al index de conocimientos
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
