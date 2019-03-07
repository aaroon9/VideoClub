<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Movie;
use App\User;
use Auth;
use Notification;

class AuthController extends Controller
{
  public function mySite(){

    $alquiler = Alquiler::all();
    $movies = Movie::all();

    return view('auth.myCatalog', array('peliculas' => $movies), array('alquilers' => $alquiler));
  }
  public function getView($id){

    $alquiler = Alquiler::all();
    $movie = Movie::findOrFail($id);

    return view('auth.show', array('pelicula' => $movie), array('alquilers' => $alquiler));
  }
}
 ?>
