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
