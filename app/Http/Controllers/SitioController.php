<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitio;
use App\Models\User;

class SitioController extends Controller
{
  
    public function index()
    {
        $sitios = Sitio::all();
        return view('sitio.index')->with('sitios', $sitios);
    }

   
    public function create()
    {
        return view('sitio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sitios = new Sitio();

        $sitios->titulo = $request->get('titulo');
        $sitios->tema = $request->get('tema');
        $sitios->url = $request->get('url'); 

        $sitios->save();

        return redirect('/sitios');
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
        $sitio = Sitio::find($id);
        return view('sitio.edit')->with('sitio', $sitio);
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
        $sitio = Sitio::find($id);

        $sitio->titulo = $request->get('titulo');
        $sitio->tema = $request->get('tema');
        $sitio->url = $request->get('url'); 

        $sitio->save();

        return redirect('/sitios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sitio = Sitio::find($id);
        $sitio->delete();
        return redirect('/sitios');
    }

    public function storeNewUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type_user = $request->type_user;
        $user->save();

        return redirect()->route('login');
    }
}
