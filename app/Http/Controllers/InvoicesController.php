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
    return view('catalog.catalog');
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


    /*$invoice = Invoice::make()



    $invoice = Invoice::make()
                    ->addItem('Test Item', 10.25, 2, 1412)
                    ->addItem('Test Item 2', 5, 2, 923)
                    ->addItem('Test Item 3', 15.55, 5, 42)
                    ->addItem('Test Item 4', 1.25, 1, 923)
                    ->addItem('Test Item 5', 3.12, 1, 3142)
                    ->addItem('Test Item 6', 6.41, 3, 452)
                    ->addItem('Test Item 7', 2.86, 1, 1526)
                    ->number(4021)
                    ->tax(21)
                    ->notes('Lrem ipsum dolor sit amet, consectetur adipiscing elit.')
                    ->customer([
                        'name'      => 'Èrik Campobadal Forés',
                        'id'        => '12345678A',
                        'phone'     => '+34 123 456 789',
                        'location'  => 'C / Unknown Street 1st',
                        'zip'       => '08241',
                        'city'      => 'Manresa',
                        'country'   => 'Spain',
                    ])
                    ->save('public/myinvoicename.pdf');

                    return view('payments.facturas');*/
  }

}
 ?>
