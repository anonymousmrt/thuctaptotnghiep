<!DOCTYPE html>
<html lang="en" class="no-js no-svg">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
@section( 'head' )
    @include( 'front.blocks.head' )
@show
</head>
<body>
<div id="page" class="site">
@section( 'header' )
    @include( 'front.blocks.header' )
@show
@yield( 'content' )
</div>
@section( 'footer' )
    @include( 'front.blocks.foot' )
@show
</body>
</html>