<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bilhetes</title>
  </head>
  <style>

      body{
       /* margin-top: -5%;*/
        margin-left: -6%;
        margin-right: -6%;
       
      }

      .container{
        
          
      }
      .box{
          margin-bottom: 1%;
          width: 100%;


      }

      .hide{
        display: none;
      }

      .numeros{
       
        position: absolute;
        font-size: 12px;
        width: 100%;
       
      }

      

  </style>
  <body>

  
    <div class="container">
      
      @for($i=0; $i<$max; $i++)
       
        <div class="box">
            <img src="{{public_path('images/bilhetes/'.$i.'.jpg')}}" width="100%">
        </div>
      @endfor
               
    </div>

  

  
  </body>
</html>