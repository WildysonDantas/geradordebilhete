<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <title>Home - Gerador de Bilhete</title>
  </head>
    <body>
        <section class="vh-100 mt-4">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 col-sm-8 text-center">
                    <h3> SpeedWay - Gerador de Bilhete</h3>
                    <small>Versão 0.5</small>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="GET" action="{{route('gerar-bilhete')}}">
                    
            
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0"><b>Especificações</b></p>
                    </div>
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                        <!-- Modelo de Bilhete -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Selecione o modelo de bilhete</label>
                        <select class="form-control" name="modelo" required>
                            
                            <option selected value="1">Modelo 1 - Bolão da Sorte / 4 Números</option>
                        </select>
                    </div>
            
                    <!-- Quantidade de Bilhetes -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Quantidade de Bilhetes</label>
                        <input type="number" name="num" id="form3Example3" minlength="1" class="form-control"
                        placeholder="Informe a quantidade de Bilhetes" required/>
                        
                    </div>
            
                    <!-- Range de numeros -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Informe o alcance dos números</label>
                        <div class="row"> 
                            <div class="col-6">
                                <label class="form-label" for="form3Example4">De </label>

                                <input type="number" name="min" value="1000" minlength="1" id="form3Example4" class="form-control" placeholder="Informe o numero inicial" required/>
                            </div>

                            <div class="col-6">
                                <label class="form-label" for="form3Example5">Até </label>
                                <input type="number" name="max" value="1500" minlength="2" id="form3Example5" class="form-control" placeholder="informe o numero final" required />
                            </div>

                        </div>
                        <small class="text-danger">*Os números informados serão gerados aleatoriamente e não serão repetidos de acordo com os campos informados</small>
                        
                        
                    </div>
            
            
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-block">Gerar</button>
                        
                    </div>
        </section>

        <section class="">
            <!-- Footer -->
            <footer class="text-center text-white" style="background-color: #0a4275;">
                <!-- Grid container -->
            
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
                <a class="text-white" href="https://speedwayti.com/">SpeedWay - TI</a>
                <br>
                <span class="me-3">Entre em contato conosco pelo WhatsApp: (89) 98128-2692</span>

                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
            </section>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>