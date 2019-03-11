<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Movie;
use App\User;
use Auth;
use Notification;
use Cart;
use App\Factura;
use App\Lineafactura;
use ConsoleTVs\Invoices\Classes\Invoice;

class InvoicesController extends Controller
{
  public function getInvoices(){
    $invoices = Factura::all();
    return view('payments.facturas', array('facturas' => $invoices));
  }
  public function myinvoices(){

    $user = User::findOrFail(Auth::user()->id);

    $id_F = date("YHi").Auth::user()->id;

    //Insert en factura
    $factura = new Factura;
    $factura->id = $id_F;
    $factura->id_user = Auth::user()->id;

    //Insert en linea de factura
    $factura_L = new Lineafactura;
    $factura_L->id_factura = $id_F;
    $factura_L->articuls = Cart::count();

    //Save
    $factura->save();
    $factura_L->save();


    $peliculas = Movie::all();
    //dd($pelicula);
    $invoice = Invoice::make();
    foreach ($peliculas as $pelicula) {
      foreach(Cart::content() as $item){
        if($item->id == $pelicula->id){
          $invoice->addItem($pelicula->title, $item->price,$item->qty);
        }
      }
    }
    $invoice->customer([
        'name'      => $user->name,
        'id'        => $user->id,
        'email'      => $user->email,
    ]);
    $invoice->save('public/'.$id_F.'.pdf');

    //Cart destroy items
    Cart::destroy();

    return redirect('/catalog');
  }

  public function getDownload($id_inv){
    $file = public_path()."/".$id_inv.".pdf";

    $headers = [
              'Content-Type' => 'application/pdf',
           ];

          return response()->download($file, $id_inv.".pdf", $headers);
  }

}
 ?>
