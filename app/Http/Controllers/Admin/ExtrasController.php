<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\Http\Request;

class ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extras = Extra::all();
        return view('Extras.index', compact('extras'));
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
        
        $url_image = $this->upload($request->file('foto'));
        $extra->foto = $url_image;

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
     * Display the specified resource.
     *
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function show(Extra $extra)
    {
        
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
    public function update(Request $request, Extra $extra)
    {
        $input = $request->all();

   
        //PARA EDITAR LA IMAGEN DE PERFIL
        if ($request->file('foto')) {
            //Removemos la imagen que se va ha actualizar
            $extra = Extra::find($extra->id);
            unlink(public_path($extra -> foto));
            //Ponemos la nueva imagen
            $url_image = $this->upload($request->file('foto'));
            $extra->foto = $url_image;
            $input['foto'] = "$url_image";
        }else{
            unset($input['image_url']);
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
        unlink(public_path($extra->foto));
        $extra->delete();
        return redirect()->back();
    }
}
