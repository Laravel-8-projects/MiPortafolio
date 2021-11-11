<?php

namespace App\Http\Controllers;

use App\Models\Fame;
use Illuminate\Http\Request;

/**
 * Class FameController
 * @package App\Http\Controllers
 */
class FameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fames = Fame::paginate();

        return view('fame.index', compact('fames'))
            ->with('i', (request()->input('page', 1) - 1) * $fames->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fame = new Fame();
        return view('fame.create', compact('fame'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fame::$rules);

        $fame = Fame::create($request->all());

        return redirect()->route('fames.index')
            ->with('success', 'Fame created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fame = Fame::find($id);

        return view('fame.show', compact('fame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fame = Fame::find($id);

        return view('fame.edit', compact('fame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fame $fame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fame $fame)
    {
        request()->validate(Fame::$rules);

        $fame->update($request->all());

        return redirect()->route('fames.index')
            ->with('success', 'Fame updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fame = Fame::find($id)->delete();

        return redirect()->route('fames.index')
            ->with('success', 'Fame deleted successfully');
    }
}
