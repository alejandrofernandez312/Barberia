<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Factura;

class GestionServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('GestionServicios.gestionServicio', [
            'servicios' => Servicio::all()
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
        return view('GestionServicios.añadirServicio');
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
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'tiempo' => 'required|numeric', 
            'descripcion' => 'required',
        ]);

        $servicio = new Servicio;
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->tiempo = $request->tiempo;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        return redirect()->route('gestionservicios.index');
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
        return view('GestionServicios.verificarBorrado', [
            'servicio' => Servicio::find($id)
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
        return view('GestionServicios.modificarServicio', [
            'servicio' => Servicio::find($id)
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
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'tiempo' => 'required|numeric', 
            'descripcion' => 'required',
        ]);

        $servicio = Servicio::find($id);
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->tiempo = $request->tiempo;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        return redirect()->route('gestionservicios.index');
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
        $facturas = Factura::where('servicio_id', $id)->get();
        foreach($facturas as $factura){
            $factura->delete();
        }
        $servicio = Servicio::find($id);
        $servicio->delete();

        return redirect()->route('gestionservicios.index');
    }
}
