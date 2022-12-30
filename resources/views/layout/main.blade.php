{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <header>
        @include('layout.header')

    </header>

    <div class="wrapper">

        <div class="sidebar">

            @include('layout.sidebar')

        </div>

        <div class="content">

            @yield('main')

        </div>

    </div>

    <footer>
        @include('layout.footer')
    </footer>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout.link')


</head>

<body>
    @include('layout.header')
    @include('layout.sidebar')
    <div class="container">
        @yield('main')
    </div>

    @include('layout.footer')
</body>

</html>