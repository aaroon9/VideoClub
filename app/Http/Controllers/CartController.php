<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Movie;
use App\User;
use Auth;
use Notification;
use Cart;

class CartController extends Controller
{

  public function getView(){
    $movie = Movie::all();
    return view('payments.carrito', array('pelicula' => $movie));
  }

  public function createItem($id_movie, Request $request){

     $precio = $request->input('precio');

     Cart::add($id_movie, '3', 1, $precio);  //Afegir element

     Notification::success('Pelicula añadida al carrito');
     return redirect('/catalog/show/'.$id_movie);
  }

  public function destroyCart(){
    Cart::destroy();
    Notification::success('Carrito Vaciado');
    return view('catalog.catalog');
  }
}
 ?>
