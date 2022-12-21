<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Crime Report</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/js/alpinejs.js') }}" defer></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
  <style>
    .a-message{
        position: fixed;
        max-width: 400px;
        /* margin: 0 auto; */
        top: 30px;
        left: 50%;
        right: -50%;
        transform: translate(-50%, -50%);
        z-index: 100;
    }
  </style>
  
  <x-flash-message />
    
  {{ $slot }}

    <script src="{{ asset('assets/js/all.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>

