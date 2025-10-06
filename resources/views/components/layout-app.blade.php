<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} @isset($pageTitle) - {{ $pageTitle }} @endisset</title>
    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <!-- resources -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css')   }}">  
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css')   }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}"> 
    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> 
    

</head>

<body>
    <x-user-bar />

    <div class="d-flex w-100 pt-7">


        <x-side-bar />
        <div class="flex-grow-1 p-3">
            {{ $slot }}
        </div>
    </div>

   
   
    
    <!-- resources -->
    <script src="{{ asset('assets/datables/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/datables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    

</body>

</html>