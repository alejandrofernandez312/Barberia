<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class GestionUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('GestionUser.gestionUsers', [
            'users' => User::all()
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
        return view('GestionUser.añadirUser');
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
            'name' => 'required|string',
            'surnames' => 'required|string',
            'email' => 'required|email', 
            'password' => 'required|min:8', 
            'phone' => 'required|numeric',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->surnames = $request->surnames;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->save();

        return redirect()->route('gestionusers.index');

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
        return view('GestionUser.verificarBorrado', [
            'user' => User::find($id)
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
        return view('GestionUser.modificarUser', [
            'user' => User::find($id),
            'clientes' => User::all()
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
            'name' => 'required|string',
            'surnames' => 'required|string',
            'email' => 'required|email', 
            'phone' => 'required|numeric',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->surnames = $request->surnames;
        $user->email = $request->email;
        if($request->password != "" && $request->password != null){
            $user->password = bcrypt($request->password);
        }
        
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->save();

        return redirect()->route('gestionusers.index');
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
        $user = User::find($id);
        $user->delete();

        return redirect()->route('gestionusers.index');
    }
}
