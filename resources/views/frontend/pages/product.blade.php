@extends('frontend.templates.default', ['title'=>'Product detail',
            'libs_elements'=>['checkout', 'bootstrap'],
            'customs_css'=>[

            ],
            'custom_scripts'=>[
                URL::asset('frontend/js/pages/products/product.js'),
                URL::asset('frontend/js/pages/products/paypal.js'), 
            ]
        ])
@section('content')

<div id="sbanner" class="sbanner sbanner-home" role="banner">
    <div class="product-banner-img" style="background-image:url(http://www.twitrcovers.com/wp-content/uploads/2013/01/Black-and-white-maps-l.jpg);"></div>
    <div class="sheet sbanner-content-wrap">
        <div class="sbanner-block">
            <div class="sbanner-content ta-center">
                <h1 class="tt-uppercase">{{$product->name}}</h1>
                <div class="sbanner-desc">
                    <p>{!! $product->description !!}</p>
                </div>
                <p class="ta-center">
                    <a href="#" class="button button-white-outline">Free Download</a>
                    <a href="#" class="button button-white-outline">Live Demo</a>
                </p>
            </div>
        </div>
    </div>
    <a href="#scontent" class="banner-scroll">
        <svg viewBox="0 0 32 32" class="icon icon-arrow-down" role="img">
            <use xlink:href="{{asset('frontend')}}/images/map.svg#icon-arrow-down" />
        </svg>
    </a>
</div><!-- #sbanner -->


<div id="scontent" class="site-content">
    <section id="product-features" class="section">
        <div class="sheet">
            <h2 class="section-title tt-uppercase ta-center mt0">Product Features</h2>
            <div class="fancy-sep ta-center"><span></span></div>
            <div class="row">
                <div class="cell-l6">
                    <div class="product-image">
                        @if($product->getMedia()->isEmpty()== false)
                            <img src="{{asset($product->getMedia()[0]->getUrl())}}" alt="">
                            @else
                            <img src="https://placeholdit.imgix.net/~text?txtsize=75&bg=F0F0F0&txtclr=32a0df&txt=placeholder&w=600&h=422" alt="">
                        @endif
                    </div>
                </div>
                <div class="cell-l6">
                    <div class="product-features">
                        <ul>
                            {!! $product->feature !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .fearured-xtensions -->

    <section id="product-addons" class="section bg-alt">
        <div class="sheet">
            <h2 class="section-title tt-uppercase ta-center mt0">Addons</h2>
            <div class="fancy-sep ta-center"><span></span></div>
            <div class="row">
                @foreach($product->addon as $addon)
                <div class="cell-l4 cell-s6">
                    <div class="xtension-gridbox data-id" data-addon="{{ base64_encode(json_encode($addon)) }}" data-media="{{ base64_encode(json_encode($addon->getMedia())) }}">
                        @if($addon->getMedia()->isEmpty()==false)
                            <img class="entry-img show-modal-addon" data-toggle="modal" data-target="#modal" src="{{asset($addon->getMedia()[0]->getUrl())}}" alt="placeholder" />
                            @else
                            <img class="entry-img show-modal-addon" data-toggle="modal" data-target="#modal" src="https://placeholdit.imgix.net/~text?txtsize=75&bg=F0F0F0&txtclr=32a0df&txt=placeholder&w=600&h=422" alt="placeholder" />
                        @endif
                        <span class="xtension-is-featured">
                            <svg class="icon icon-star-full" role="img">
                                <use xlink:href="{{asset('frontend')}}/images/map.svg#icon-star-full" />
                            </svg>
                        </span>
                        <div class="xtension-desc ta-center">
                            <h4 class="entry-title mt0"><a href="#">{{$addon->name}}</a></h4>
                            <div class="xtension-price tt-uppercase">
                                <span class="price-title">From</span>
                                <span class="price-amount">${{$addon->price}}</span>
                                <button type="button" class="show-modal-addon" data-toggle="modal" data-target="#modal">Buy now</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div><!-- #scontent -->


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Review</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Support</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="owl-carousel text-left" data-navigation="false" data-singleitem="true" data-autoplay="true" data-transition="fade">
                                        
                                        <div class="item dragCursor">
                                            <img src="" id="image" class="img-responsive" data-src="https://placeholdit.imgix.net/~text?txtsize=75&bg=F0F0F0&txtclr=32a0df&txt=placeholder&w=600&h=422" alt="img" />
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4" >
                                    <div class="row" style="height: 250px; overflow: scroll ; overflow-x: hidden;">
                                        <div class="col-lg-12">
                                            <h3>Feature :</h3>
                                            <span id="feature"></span>
                                        </div>
                                    </div>
                                    <hr style="margin: 1em 10px;">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3>Price : <span id="price" data-id="" value=""></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">Review</div>
                        <div role="tabpanel" class="tab-pane" id="messages">Support</div>
                        <div role="tabpanel" class="tab-pane" id="settings">...</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" data-id="">
                <div id="paypal-button"></div>
                <a href="#" id="buy-now"  class="btn btn-primary pull-right">Buy Now</a>
            </div>

        </div>
    </div>
</div>

@endsection