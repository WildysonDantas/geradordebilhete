<?php
 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Image;
use Dompdf\Options;
use Carbon\Carbon;
use Str;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    /**
     * Show the media for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
   

    function randomGen($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    function addZerosLeft(Int $item){
        if($item < 10){
            $item = "000". $item;
        }else if($item < 100){
            $item =  "00". $item;
        }else{
            $item =  "0". $item;
        }

        return $item;
    }

    public function makeCanhoto1($img, $dt, Array $array, String $data){
    
        $numeros = "";
         //DATA CANHOTO1
        $img->text($data, 250,  80, function($font) {
            $font->file(public_path('arial/arial.ttf'));
            $font->size(30);

        }); 

        foreach($array as $key => $item ){
            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }
            $numeros = $numeros  . ($item . " ");
        }
        //NUMEROS CANHOTO 1
        $img->text($numeros, 150,  152, function($font) {
            $font->file(public_path('arial/arial.ttf'));
            $font->size(28);

        }); 

    
        //CODIGO CANHOTO 1
      return  $img->text($dt, 150,  215, function($font) {
        $font->file(public_path('arial/arial.ttf'));
        $font->size(30);
   
         });  

    }

    public function makeCanhoto2($img, $dt, Array $array, String $data){
    
        $numeros = "";
         //DATA CANHOTO 2
        $img->text($data, 1295,  80, function($font) {
            $font->file(public_path('arial/arial.ttf'));
            $font->size(30);

        }); 

        foreach($array as $key => $item ){
            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }
            $numeros = $numeros  . ($item . " ");
        }
        //NUMEROS CANHOTO 2
        $img->text($numeros, 1195,  152, function($font) {
            $font->file(public_path('arial/arial.ttf'));
            $font->size(28);

        }); 

        //CODIGO CANHOTO 2
        return $img->text($dt, 1195,  215, function($font) {
            $font->file(public_path('arial/arial.ttf'));
            $font->size(30);
       
        }); 

    }

    //Escreve uma Imagem
    public function makeimageOne(Int $count, Array $array, String $data) {  
        $img = Image::make(public_path('images/modelo/bn1.jpg'));  
        $position = 75;
        $random = Str::random(8);
        $dt = $random;
        
        $width = 865;

    
        $img = $this->makeCanhoto1($img, $dt, $array, $data);
      
      

        foreach($array as $key => $item){
            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }
            $img->text($item, $width, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(45);
                
            });  

            $img->text($dt, 845,  310, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(30);  
            
                
            });  
            
            $position += 80;

            if($key == 1){
                $width = 1020;
                $position = 75;
            }

        }
      
       $img->save(public_path('images/bilhetes/'.$count.'.jpg')); 
       return $random;
      
    }  

   

    //Escreve duas Imagens em Linha
    public function makeimageTwo(Int $count, Array $array, Array $array2, String $data) {  
       $img = Image::make(public_path('images/modelo/bn2.jpg'));  
       $position = 75;
       // use callback to define details
       $random = Str::random(8);
       $dt = $random;
      // $random = Str::random(8);
       $keys = [$random];
       $width = 1910;

       
        $img = $this->makeCanhoto2($img, $dt, $array, $data);
        

       foreach($array as $key => $item ){
            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }
            $img->text($item, $width, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(45);
                
            });  

            $img->text($dt, 1890,  310, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(30);
               
                
                
            });  
            $position += 80;

            if($key == 1){
                $width = 2065;
                $position = 75;
            }

       }

       $position = 75;
       $random2 = Str::random(8);
       $dt = $random2;
       $keys = [$random, $random2];
       $width = 865;

    
        $img = $this->makeCanhoto1($img, $dt, $array2, $data);
      
      

       foreach($array2 as $key => $item){
            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }
            $img->text($item, $width, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(45);
                
            });  

            $img->text($dt, 845,  310, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(30);
                
               
            
                
            });  
            
            $position += 80;

            if($key == 1){
                $width = 1020;
                $position = 75;
            }

        }
      
       $img->save(public_path('images/bilhetes/'.$count.'.jpg')); 

       return $keys;
      
    }  

    /*//Escreve 3 imagens em linha
    public function makeimageThree(Int $count, Array $array, Array $array2, Array $array3){  
        $img = Image::make(public_path('images/modelo/bn3.jpg'));  
        $position = 89;
        $random = Str::random(8);
        $dt = "cod.: ". $random;
       // use callback to define details
        //Array 1
        foreach($array as $item){

            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }

            $img->text($item, 96, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(24);
                
            });  

            $img->text($dt, 122,  292, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(13);
                $font->align('center');
                
                
            });  
            $position += 40;

       }

       $position = 89;
       $random2 = Str::random(8);
       $dt = "cod.: ". $random2;
      
      
         //Array 2
       foreach($array2 as $item){

            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }

            $img->text($item, 673, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(24);
                
            });  

            $img->text($dt, 699,  292, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(13);
                $font->align('center');
            
                
            });  
            
            $position += 40;

        }

        $position = 89;
        $random3 = Str::random(8);
        $dt = "cod.: ". $random3;
        $keys = [$random, $random2, $random3];


        foreach($array3 as $item){

            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }

            $img->text($item, 1250, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(24);
                
            });  

            $img->text($dt, 1276,  292, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(13);
                $font->align('center');
            
                
            });  
            
            $position += 40;
 
         }
      
       $img->save(public_path('images/bilhetes/'.$count.'.jpg')); 
       return $keys;
      
    }  

     //Escreve 4 imagens em linha
     public function makeimageFour(Int $count, Array $array, Array $array2, Array $array3, Array $array4){  
        $img = Image::make(public_path('images/modelo/bn4.jpg'));  
        $position = 89;
        $random = Str::random(8);
        $dt = "cod.: ". $random;
       // use callback to define details
        //Array 1
       foreach($array as $item){

            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }

            $img->text($item, 96, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(24);
                
            });  

            $img->text($dt, 122,  292, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(13);
                $font->align('center');
                
                
            });  
            $position += 40;

       }

       $position = 89;
       $random2 = Str::random(8);
       $dt = "cod.: ". $random2;
      
      
         //Array 2
       foreach($array2 as $item){

            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }

            $img->text($item, 673, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(24);
                
            });  

            $img->text($dt, 699,  292, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(13);
                $font->align('center');
            
                
            });  
            
            $position += 40;

        }

        $position = 89;
        $random3 = Str::random(8);
        $dt = "cod.: ". $random3;


        foreach($array3 as $item){

            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }

            $img->text($item, 1250, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(24);
                
            });  

            $img->text($dt, 1276,  292, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(13);
                $font->align('center');
            
                
            });  
            
            $position += 40;
 
         }

         $position = 89;
         $random4 = Str::random(8);
         $dt = "cod.: ". $random4;
         $keys = [$random, $random2, $random3, $random4];

         foreach($array4 as $item){

            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }

            $img->text($item, 1827, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(24);
                
            });  

            $img->text($dt, 1853,  292, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(13);
                $font->align('center');
            
                
            });  
            
            $position += 40;
 
         }
      
       $img->save(public_path('images/bilhetes/'.$count.'.jpg')); 
      return $keys;
    }  

    */

    //Mudar para um ou duas imagens do PDF
    public function switchTickets(Array $numeros, Int $range, String $data){

        $i=0;
        $count = 0;
        $l=0;
        $rd = [];


        while($i < count($numeros)){

           /* if(($count + 4) <= $range){
                
                $arr1 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr2 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr3 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr4 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $ids = $this->makeimageFour($l, $arr1, $arr2, $arr3, $arr4);
               // dd( $arr1, $arr2, $arr3, $arr4);

                $rd[$ids[0]]['value'] = $arr1;
                $rd[$ids[0]]['id'] =$ids[0];
                $rd[$ids[1]]['value'] = $arr2;
                $rd[$ids[1]]['id'] = $ids[1];
                $rd[$ids[2]]['value'] = $arr3;
                $rd[$ids[2]]['id'] = $ids[2];
                $rd[$ids[3]]['value'] = $arr4;
                $rd[$ids[3]]['id'] = $ids[3];
                $i += 4;
                $count += 4;

            }else if(($count + 3) <= $range){
                
                $arr1 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr2 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr3 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $ids = $this->makeimageThree($l, $arr1, $arr2, $arr3);

                $rd[$ids[0]]['value'] = $arr1;
                $rd[$ids[0]]['id'] =$ids[0];
                $rd[$ids[1]]['value'] = $arr2;
                $rd[$ids[1]]['id'] = $ids[1];
                $rd[$ids[2]]['value'] = $arr3;
                $rd[$ids[2]]['id'] = $ids[2];
                $i += 4;
                $count += 3;

            }else*/
             if($count + 1 < $range){
               $arr1 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
               $i += 4;
               $arr2 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
               $i += 4;
               //Retornando os ids de seus repectivos numeros
               $ids = $this->makeimageTwo($l, $arr1, $arr2, $data);
                
               $rd[$ids[0]]['value'] = $arr1;
               $rd[$ids[0]]['id'] =$ids[0];
               $rd[$ids[1]]['value'] = $arr2;
               $rd[$ids[1]]['id'] = $ids[1];
               $rd[$ids[0]]['data'] = $data;
               $rd[$ids[1]]['data'] = $data;
               

              // dd(json_encode($rd));

              
               $count += 2;
           }else{
               
               $arr1 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
               $ids = $this->makeimageOne($l, $arr1, $data);
               $i += 4;
               $count++;
               $rd[$ids]['value'] = $arr1;
               $rd[$ids]['id'] = $ids;
               $rd[$ids]['data'] = $data;
           }

          
          $l++;
          
       }

        $json[$data] = $rd;
        $ticket = new Ticket();
        $ticket->data = $data;
        $ticket->tickets = json_encode($rd);
        $ticket->save();
       //dd(json_encode($json));

       return $l;
    }

   
    
    public function generate(Request $request)
    {
        // return view("home");
        $min = $request->min;
        $max =  $request->max;
        $num =  ($request->num * 4);
        $intervalo = $max - $min;
        
       
        if($min > $max){
            return back()->with('error', 'O numero minimo informado no intervalo não pode ser maior que o numero final!');

        }

        if(($num) > $intervalo ){

            return back()->with('error', 'O numero de bilhetes a ser gerados é maior que o intervalo de numeros informados!');
            //retornar erro pois a  
        }
      
        $data =  Carbon::createFromFormat('Y-m-d', $request->data)->format('d/m/Y');
        
        $numeros = $this->randomGen($min,$max,$num);
        $range = (int) $request->num;
        $count = $this->switchTickets($numeros, $range, $data);

       
       
       
        $pdf = PDF::loadView('modelo/pdf1', ['max' =>$count, 'numeros'=>$numeros])->setPaper('a4', 'landscape');
        return $pdf->stream($data.'.pdf');
      
       

    }

    public function viewTicket($id){
       
        $ticket = Ticket::where('tickets', 'like', '%"'. $id .'"%' )->first();

        if(empty($ticket)){
            return back()->with('error', 'O código informado não foi encontrado. Tente novamente');
        }
        #carregar novas imagem

        $img = Image::make(public_path('images/modelo/bn1.jpg'));  
        $position = 75;

        $json =  (array) json_decode($ticket->tickets, true );
        //dd($json);
        $tk = $json[$id];
        $dt = $tk['id'];
        $array = $tk['value'];
        $width = 865;

    
        $img = $this->makeCanhoto1($img, $dt, $array, $tk['data']);
      
      

        foreach($array as $key => $item){
            if($item < 1000){
                $item = $this->addZerosLeft($item);
            }
            $img->text($item, $width, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(45);
                
            });  

            $img->text($dt, 845,  310, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(30);  
            
                
            });  
            
            $position += 80;

            if($key == 1){
                $width = 1020;
                $position = 75;
            }

        }
       
        $img->save(public_path('images/bilhetes/visualizar.jpg')); 
        return view('admin.to_view');

    }

    public function findTicket(Request $request){

        $credentials = $request->validate([
            'ticket' => ['required', 'min:8'],
        ], ['min' => 'O ticket deve ter no minimo 8 caracteres', 
            'max' => 'O ticket deve ter no maximo 8 caracteres', 
            'required' => "O campo ticket é  obrigatorios"]
        );

        $id = $request->ticket;
        $ticket = Ticket::where('tickets', 'like', '%"'. $id .'"%' )->first();

        if(empty($ticket)){
            return back()->with('error', 'O código informado não foi encontrado. Tente novamente');
        }

        //$json =  (array) json_decode($ticket->tickets, true);
        //$arr = $json[$id];
        
        return redirect()->route('view-ticket',['ticket'=> $id]);
        //dd();
   
        
    }
}