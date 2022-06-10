<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseña;
use App\Models\Factura;

class GestionResenasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('GestionReseña.gestionReseña', [
            'facturas' => Factura::where('reseña_id', '!=', 'null')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('GestionReseña.verificarBorrado', [
            'factura' => Factura::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('GestionReseña.modificarReseña', [
            'factura' => Factura::find($id)
        ]);
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
        //
        // $request->validate([
        //     'name' => 'required|string',
        //     'surnames' => 'required|string',
        //     'email' => 'required|email', 
        //     'phone' => 'required|numeric',
        // ]);

        $reseña = Reseña::find($id);
        $reseña->descripcion = $request->textArea;
        $reseña->puntuacion = $request->puntuacion;

        $reseña->save();

        return redirect()->route('gestionresenas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reseña = Reseña::find($id);
        $reseña->delete();

        return redirect()->route('gestionresenas.index');
    }
}
