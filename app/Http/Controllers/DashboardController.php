<?php
 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Image;
use Dompdf\Options;
use Carbon\Carbon;
use Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the media for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function home(){
       return view('admin.dashboard');
       
    }

    //Formulario de especifcações para gerar o bilhete
    public function ticket(){
        return view('admin.generate');

    }

    //Procurar Bilhete
    public function searchTicket(){
        return view('admin.search');

    }

   
   

}