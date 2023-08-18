<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
</head>
<body class="bg-secondary">
    
    <div class="container">
        @yield('content')
    </div>


    <script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>