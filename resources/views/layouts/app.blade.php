<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{$metatitle}}</title>
    <meta name="description" content="{{$metadescription}}">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/Articles-Cards-images.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script defer src="https://cdn.jsdelivr.net/npm/[email protected]/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>




    @livewireStyles
    

</head>

<body>
    <div class="container py-4 py-xl-5" style="padding-top: 29px;margin-top: -10px;">
        {{-- Navbar --}}
        <x-navbar/>


        {{$slot}} 

            
        @include('sweetalert::alert')


      
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    @livewireScripts
</body>

</html>