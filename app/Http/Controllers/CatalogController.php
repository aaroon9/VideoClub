<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Notification; 
class CatalogController extends Controller
{
    public function getIndex(){
    	$movies = Movie::all();
    	return view('catalog.catalog', array('peliculas' => $movies));
    }

    public function getShow($id){
    	$model = Movie::findOrFail($id);
    	return view('catalog.show', array('pelicula' => $model));
    }

    public function getCreate(){

    	return view('catalog.create');
    }

    public function getEdit($id){
    	$edit = Movie::findOrFail($id);
    	return view('catalog.edit', array('pelicula' => $edit));
    }
    public function postCreate(Request $request){
        $peli= new Movie;
        $peli->title = $request->input('title');
        $peli->year = $request->input('year');
        $peli->director = $request->input('director');
        $peli->poster = $request->input('poster');
        $peli->synopsis = $request->input('synopsis');
        $peli->rented = true;
        $peli->save();
        Notification::success('Success message');
        return redirect('/catalog');

    }
    public function putEdit(Request $request){
        $id = $request->input('id');
        $peli = Movie::findOrFail($id);
        $peli->title = $request->input('title');
        $peli->year = $request->input('year');
        $peli->director = $request->input('director');
        $peli->poster = $request->input('poster');
        $peli->synopsis = $request->input('synopsis');
        $peli->save();
        Notification::success('Success message');
        return redirect('/catalog/show/'.$id);

    }
    public function putRent($id){
        $peli = Movie::findOrFail($id);
            $peli->rented = false;
            $peli->save();
            Notification::success('Success message');

        return redirect('/catalog/show/'.$id);
    }
    public function putReturn($id){
        $peli = Movie::findOrFail($id);
            $peli->rented = true;
            $peli->save();
            Notification::success('Success message');
        return redirect('/catalog/show/'.$id);
    }
    public function deleteMovie($id){
        $peli = Movie::findOrFail($id);
        $peli->delete();
        Notification::success('Success message');
        return redirect('/catalog');
    }

}
