<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Page &mdash; @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('style/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('style/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/components.css') }}">

    <!--Toaster-->


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('style/modules/izitoast/css/iziToast.min.css') }}">

    {{-- style X_EDITABLE --}}
    {{-- <link rel="stylesheet" href="{{ asset('style/css/bootstrap-editable.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('style/css/jqueryui-editable.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap-editable.css') }}">
    {{-- toggle --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <style>
        iframe {
            width: 1000px;
            height: 500px;
            margin-left: 30px;
            margin-top: 10px;
            border: none;
            animation: fadeIn 2s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .s {

            margin-left: -30px;
            margin-top: -30px;

        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <!-- JS -->





    {{-- end --}}
