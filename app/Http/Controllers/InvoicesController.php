<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Movie;
use App\User;
use Auth;
use Notification;
use Cart;
use ConsoleTVs\Invoices\Classes\Invoice;

class InvoicesController extends Controller
{
  public function myinvoices(){

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

                    return view('payments.facturas');
  }

}
 ?>