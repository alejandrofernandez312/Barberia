<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Servicio;
use Datetime;
use Auth;


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
        return view('citas');
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
        // $request->validate([
        //     'nombre' => 'required|max:255',
        //     'numero' => 'required|numeric',
        //     'descripcion' => 'required',
        //     'correo' => 'required|email',
        //     'apellidos' => 'required',
        // ]);


        $servicio = Servicio::find($request->servicio);

        $factura = new Factura;

        $date = new DateTime($request->fechacita);
        $date->format('Y-m-d H:i:s');
        $factura->start = $date;
        
        //Sumar minutos del servicio a la fecha para crear la fecha end
        $nuevaFecha = strtotime ( '+' . $servicio->tiempo .'minutes' , strtotime ($request->fechacita) );
        $nuevaFecha = date ( 'Y-m-d H:i:s' , $nuevaFecha); 
        $factura->end = $nuevaFecha;
        
        $factura->servicio_id = $request->servicio;
        $factura->cliente_id =$request->cliente;
        $factura->save();

        return redirect('/citas');


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
        dd($id);
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
        dd("Has eliminado la factura con id" . $id);
        // Factura::destroy($id);
    }

     /**
     * Genera el pdf de una cita
     *
     * @param  mixed $id
     * @return void
     */
    public function generarPDF($id)
    {
        $factura = Factura::find($id);
        $pdf = app('dompdf.wrapper');

        $pdf->loadView('PDF.plantilla', compact('factura'));

        return $pdf->stream('factura.pdf');

    }
}
