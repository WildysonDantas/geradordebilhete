<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bilhetes</title>
</head>
<style>
    body {
        /* margin-top: -5%;*/



    }

    .container {
        margin-left: -4%;
        margin-right: -4%;
        margin-top: -4%;
        margin-bottom: -5%
    }

    .box {

        width: 97%;


    }

    .hide {
        display: none;
    }

    .numeros {

        position: absolute;
        font-size: 12px;
        width: 100%;

    }
</style>

<body>


    <div class="container">

        @for ($i = 0; $i < $max; $i++)
            <div class="box">
                <img src="{{ public_path('images/bilhetes/' . $i . '.jpg') }}" width="100%">
            </div>
        @endfor

    </div>




</body>

</html>
