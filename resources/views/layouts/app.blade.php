<!DOCTYPE html >
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('layouts/head')
    @yield('customhead')
        
</head>
<body class="d-flex align-items-center flex-column">
    <!--NAVBAR-->
    @include('layouts/navbar')
    <!--END OF NAVBAR-->
    
    <div class="bg-white form-structure">
            @yield('modal')
        <!--ALERTS-->
        <div class="container ">
            @include('layouts.alerts')
        </div>
        <!--END OF ALERTS-->
        <h1 class="ms-2"> @yield('page-title')
                <hr>
        </h1>

        <!--CONTENT-->

        <div class="position-relative  p-3">
            @yield('content')
        </div>
        <!--END OF CONTENT-->

    </div>

    </div>
  
    
</body>
</html>