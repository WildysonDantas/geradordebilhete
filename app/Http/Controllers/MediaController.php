<?php
 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Image;
use Dompdf\Options;
use Carbon\Carbon;

class MediaController extends Controller
{
    /**
     * Show the media for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view("home");
    }

    function randomGen($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    public function makeimageOne($count, $array)  
    {  
       $img = Image::make(public_path('images/modelo1-1n.jpg'));  
       //$img->text('This is a example ', 120, 100);
       $position = 82;
       // use callback to define details

       foreach($array as $item){
            $img->text($item, 105, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(20);
                
            });  
            $position += 37;

       }
      
       $img->save(public_path('images/bilhetes/'.$count.'.jpg')); 
      
    }  

    public function makeimageTwo($count, $array, $array2)  
    {  
       $img = Image::make(public_path('images/modelo1-2n.jpg'));  
       //$img->text('This is a example ', 120, 100);
       $position = 82;
       // use callback to define details

       foreach($array as $item){
            $img->text($item, 105, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(20);
                
            });  
            $position += 37;

       }

       $position = 82;

       foreach($array2 as $item){
            $img->text($item, 652, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(20);
                
            });  
            $position += 37;

        }
      
       $img->save(public_path('images/bilhetes/'.$count.'.jpg')); 
      
    }  

    public function makeimageThree($count, $array, $array2, $array3)  
    {  
       $img = Image::make(public_path('images/modelo1-3.jpg'));  
       //$img->text('This is a example ', 120, 100);
       $position = 82;
       // use callback to define details
        //Array 1
       foreach($array as $item){
            $img->text($item, 105, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(20);
                
            });  
            $position += 37;

       }

       $position = 82;
         //Array 2
       foreach($array2 as $item){
            $img->text($item, 652, $position, function($font) {
                $font->file(public_path('arial/arial.ttf'));
                $font->size(20);
                
            });  
            $position += 37;

        }

        $position = 82;
          //Array 3
        foreach($array3 as $item){
             $img->text($item, 1199, $position, function($font) {
                 $font->file(public_path('arial/arial.ttf'));
                 $font->size(20);
                 
             });  
             $position += 37;
 
         }
      
       $img->save(public_path('images/bilhetes/'.$count.'.jpg')); 
      
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
        $model1 = public_path('images/modelo1-1.jpg');
        $model2 = public_path('images/modelo1-2.jpg');
        $model3 = public_path('images/modelo1-3.jpg');
        $path = [$model1, $model2, $model3];

        //return view('modelo/pdf1', ['path' => $path]);
       // dd($modelo);
       //dd();
        $numeros = $this->randomGen($min,$max,$num);
        $count = 0;
        $i=0;
        $range = (int) $request->num;
        $l = 0;
        //dd(count($numeros));
        while($i < count($numeros)){
            if(($count + 3) <= $range){
                
                $arr1 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr2 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr3 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $this->makeimageThree($l, $arr1, $arr2, $arr3);
                $i += 4;
                $count += 3;
            }else if($count + 1 < $range){
                $arr1 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $arr2 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $i += 4;
                $this->makeimageTwo($l, $arr1, $arr2);
                $count += 2;
            }else{
                
                $arr1 = [$numeros[$i], $numeros[$i+1], $numeros[$i+2],  $numeros[$i+3] ];
                $this->makeimageOne($l, $arr1);
                $i += 4;
                $count++;
            }

           
           $l++;
           
        }
        $mytime = Carbon::now();
        //dd("Successo", $mytime->toDateTimeString()); 
       
        $pdf = PDF::loadView('modelo/pdf1', ['model1' => $model1, 'model2'=>$model2, 'model3'=> $model3, 'max' =>$l, 'numeros'=>$numeros]);
        return $pdf->stream('invoice.pdf');
      
       

    }
}