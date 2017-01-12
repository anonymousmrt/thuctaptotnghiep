@extends( 'front.layout' )
@section( 'head' )
    @parent
    <title>This is home baby</title>
    <link rel="stylesheet" href="{{ asset( 'front' ) }}/css/home-only.css"/>
@stop

@section( 'content' )
<div id="banner" class="site-banner">
    <canvas id="banner-canvas"></canvas>
    <div class="sheet">
        <div class="banner-content">
            <div class="banner-content-inner">
                <h1>Fast convenient <br>and flexible solutions</h1>
                <p><a href="#" class="button button-white-outline button-xl">View extensions</a></p>
            </div>
        </div>
    </div>
    <a href="#content" class="anchor-arrow">Angle down</a>
</div>
    @forelse( $products as $product )
        {{ $product->name }}
        <?php dd( $product ); ?>
    @empty
        no product
    @endforelse
@stop

@section( 'footer' )
    @parent
    <script type="text/javascript" src="{{ asset( 'front' ) }}/js/home-only.js"></script>
@stop
