<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function showMovie($id='hola')
    {
        //$user = Movie::findOrFail($id); //NO FUNCIONA
        //return view('user.profile', array('user' => $user);
        return $id;
    }
}
