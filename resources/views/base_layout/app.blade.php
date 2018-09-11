<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css">
</head>
<body>
<header>
    @include('base_layout.components.header')
</header>
<br>

<div class="container">
    @include('base_layout.components.messages')
    @yield('content')

</div>

<footer>
    @include('base_layout.components.footer_meta')
    @yield('script')
</footer>


</body>
</html>