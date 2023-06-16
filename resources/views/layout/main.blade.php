<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notulensi Meeting</title>

        {{-- <link rel="icon" href="{{ asset('imgs/favicon.ico') }}" type="image/x-icon"/> --}}
        {{-- <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}"> --}}
        {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ asset('css/rubic.css') }}">
        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/r-2.3.0/datatables.min.css"/>

        {{-- Toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    @include('export.index')
    
    
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

        <script src="{{ asset('vendors/jquery/jquery-3.4.1.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.affix.js') }}"></script>
        <script src="{{ asset('js/rubic.js') }}"></script>
        <script src="https://kit.fontawesome.com/bf2986434e.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/r-2.3.0/datatables.min.js"></script>

        @yield('script')
</body>
</html>