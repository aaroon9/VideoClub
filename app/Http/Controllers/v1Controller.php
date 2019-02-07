<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class v1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Movie::all() );
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
        $peli = new Movie;
        $peli->title = $request->input('title');
        $peli->year = $request->input('year');
        $peli->director = $request->input('director');
        $peli->poster = $request->input('poster');
        $peli->synopsis = $request->input('synopsis');
        $peli->save();
        return response()->json( $peli );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peli = Movie::findOrFail( $id );
        return response()->json( $peli );
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
        $peli = Movie::findOrFail($id);
        if(isset($request->title)){
            $peli->title = $request->input('title');
        }
        if(isset($request->year)){
            $peli->year = $request->input('year');
        }
        if(isset($request->director)){
            $peli->director = $request->input('director');
        }
        if(isset($request->poster)){
            $peli->poster = $request->input('poster');
        }
        if(isset($request->synopsis)){
            $peli->synopsis = $request->input('synopsis');
        }
        $peli->save();
        return response()->json( $peli );
    }

    /*Rent Movie*/
    public function putRent($id){
        $peli = Movie::findOrFail( $id );
        $peli->rented = true;
        $peli->save();
        return response()->json( ['error' => false,
                          'msg' => 'La película se ha marcado como alquilada' ] );

    }

    /*Return Movie*/
    public function putReturn($id){
        $peli = Movie::findOrFail( $id );
        $peli->rented = false;
        $peli->save();
        return response()->json( ['error' => false,
                          'msg' => 'La pelicula se ha marcado como disponible' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peli = Movie::findOrFail( $id );
        $peli->delete();
        return response()->json( ['error' => false,
                          'msg' => 'La pelicula ha sido eliminada' ] );
    }
}
