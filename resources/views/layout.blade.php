<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <!-- Styles -->
    <style>
        @page{
            size: 58mm;
        }
        html, body {
            padding: 45px;
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        @media print {

            body.printOrder * {
                visibility: hidden;
            }
            @media print
            {
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
            body.printOrder .modal-dialog {
                position: absolute;
                padding: 0;
                margin: 0;
                left: 0;
                top: 0;
            }

            body.printOrder .modal-dialog .modal-content {
                border-width: 0;
            }

            body.printOrder .modal-dialog .modal-content .modal-header .modal-title,
            body.printOrder .modal-dialog .modal-content .modal-body,
            body.printOrder .modal-dialog .modal-content .modal-body * {
                visibility: visible;
            }

            body.printOrder .modal-dialog .modal-content .modal-header,
            body.printOrder .modal-dialog .modal-content .modal-body {
                padding: 0;
            }

            body.printOrder .modal-dialog .modal-content .modal-header .modal-title {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light">

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Domů</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('items') }}">Položky</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders') }}">Objednávky</a>
        </li>
    </ul>

</nav>
<div id="app">
    @yield('content')
</div>


<script async src="{{mix('js/app.js')}}"></script>
<script>



</script>
</body>
</html>
