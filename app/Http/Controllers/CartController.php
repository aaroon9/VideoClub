<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Movie;
use App\User;
use Auth;
use Notification;

class CartController extends Controller
{
  public function getView(){
    return view('payments.carrito');
  }
  public function createItem($id_movie, Request $request){

    Cart::add('3', $id_movie, 1, 3.90);  //Afegir element

    Notification::success('Pelicula al carrito');
    return redirect('/catalog/show/'.$id_movie);

  }
}
 ?>
