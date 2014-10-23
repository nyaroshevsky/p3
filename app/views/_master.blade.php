<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Awesome Tool For Web Development')</title>
    @yield('includes')
</head>
<body>
	<span style="padding-left:30%"><a href='/'>&larr; Home</a></span>
    <div class="main" align="center">

    	@yield('content')
    </div>
</body>
</html>