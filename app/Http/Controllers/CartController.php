<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Movie;
use App\User;
use App\Carrito;
use Auth;
use Notification;
use Illuminate\Support\Facades\DB;
// use Cart;

class CartController extends Controller
{

  public function getView(){
    $movie = Movie::all();
    return view('payments.carrito', array('pelicula' => $movie));
  }
<<<<<<< HEAD

  public function createItem($id_movie){

    $peli = Movie::findOrFail($id_movie);

    // comprobamos si existe el articulo  en el carrito
    $article = Carrito::findOrFail($id_movie);


    if ($article){
      // si existe anadimos una unidad
        $article->increment('unidads',1);
    } else {
      // sino lo creamos
        $article = new Carrito();
        $article->unidads = 1;
        $article->title = $peli->title;
        $article->precio = $peli->precio;
        $article->save();
    }



     Cart::add($id_movie, '3', 1, 3.90);  //Afegir element
=======

  public function createItem($id_movie, Request $request){
>>>>>>> f46f8744dfc6630be0770b7faf3888cfa1322942

     $precio = $request->input('precio');

     Cart::add($id_movie, '3', 1, $precio);  //Afegir element

     Notification::success('Pelicula añadida al carrito');
     return redirect('/catalog/show/'.$id_movie);
  }

  public function destroyCart(){
    Cart::destroy();
    Notification::success('Carrito Vaciado');
    return redirect('/catalog');
  }
}
 ?>
