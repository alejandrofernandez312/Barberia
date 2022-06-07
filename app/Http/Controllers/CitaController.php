<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Servicio;


class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request);
        // $request->validate([
        //     'nombre' => 'required|max:255',
        //     'numero' => 'required|numeric',
        //     'descripcion' => 'required',
        //     'correo' => 'required|email',
        //     'apellidos' => 'required',
        // ]);

        $servicio = Servicio::find($request->servicio);

        $factura = new Factura;
        $factura->precio_total = $servicio->precio;
        $factura->tiempo_total = $servicio->tiempo;
        $factura->nombre = $request->nombre;
        $factura->apellidos = $request->apellidos;
        $factura->telefono = $request->telefono;
        $factura->correo = $request->correo;
        $factura->start = $request->fechacita;
        $nuevaFecha = strtotime ( '+' . $servicio->tiempo .'minutes' , strtotime ($request->fechacita) );
        dd($request->fechacita . "    ". $nuevaFecha);
        $factura->end = $request->telefono;
        $factura->title = $servicio->nombre;
        $factura->servicio_id = $request->servicio_id;


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
    }
}
