@extends('frontend.templates.default', ['title'=>'fsflex - Premium Exensions',
            'libs_elements'=>['carousel'],
            'customs_css'=>[

            ],
            'custom_scripts'=>[
                
            ]
        ])
@section('content')
<div id="sbanner" class="sbanner sbanner-home" role="banner">
    <div id="sbanner-particles"></div>
    <div class="sheet sbanner-content-wrap">
        <div class="sbanner-block">
            <div class="sbanner-content ta-center">
                <svg viewBox="0 0 32 32" class="banner-logo" role="img">
                    <use xlink:href="{{asset('frontend')}}/images/map.svg#logo" />
                </svg>
                <h1 class="tt-uppercase">Fast convenient <br/>and flexible solutions</h1>
                <p class="mb0"><a href="#viewextensions" class="button button-white-outline button-large tt-uppercase intractable">View Extensions</a></p>
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
    <section id="fearured-xtensions" class="section">
        <div class="sheet">
            <h2 class="section-title tt-uppercase ta-center mt0">Featured Extensions</h2>
            <div class="fancy-sep ta-center"><span></span></div>
            <div class="carousel-block">
                <div class="carousel owl-carousel" data-theme-carousel="true" data-options='{"nav":false,"dots":true,"responsive":{"0":{"items":1},"768":{"items":2},"1020":{"items":3}},"lazyLoad":true}'>
                    @if($addons != null)
                        @foreach($addons as $addon)
                        <div class="carousel-item">
                            <div class="xtension-gridbox">
                                @if($addon->getMedia()->isEmpty() == false)
                                    <img class="entry-img owl-lazy" data-src="{{asset($addon->getMedia()[0]->getUrl())}}" alt="placeholder" />
                                    @else
                                <img class="entry-img owl-lazy" data-src="https://placeholdit.imgix.net/~text?txtsize=75&bg=F0F0F0&txtclr=32a0df&txt=placeholder&w=600&h=422" alt="placeholder" />
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                </div>
            </div>

            <div class="ta-center read-more-block">
                <a href="#" class="button button-outline tt-uppercase">
                    View all
                    <svg viewBox="0 0 32 32" class="icon icon-arrow-right" role="img">
                        <use xlink:href="{{asset('frontend')}}/images/map.svg#icon-arrow-right" />
                    </svg>
                </a>
            </div>
        </div>
    </section><!-- .fearured-xtensions -->

    <section id="general-features" class="section bg-alt">
        <div class="sheet">
            <div class="feature-block odd">
                <div class="feature-block-image">
                    <img src="{{asset('frontend')}}/images/features-rocket.png" alt="features">
                </div>
                <div class="feature-block-content">
                    <h6 class="subtitle mt0 weak-color tt-uppercase">Our extension</h6>
                    <h2 class="h3 tt-uppercase mt0">Lightweigh and fast</h2>
                    <div class="fancy-sep ta-left"><span></span></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error delectus, voluptatibus exercitationem, neque veniam libero quo necessitatibus, repudiandae nihil provident, ea odio.</p>
                    <p>Esse, veritatis, minima. Deserunt, nostrum expedita delectus facilis voluptatem provident pariatur obcaecati veritatis ducimus. Aliquid fugit repellendus excepturi, magni rem sunt, dignissimos porro officia recusandae totam repudiandae, impedit ab alias?</p>
                </div>
            </div>
            <div class="feature-block even">
                <div class="feature-block-image">
                    <img src="{{asset('frontend')}}/images/features-cogs.png" alt="features">
                </div>
                <div class="feature-block-content">
                    <h6 class="subtitle mt0 weak-color tt-uppercase">Our services</h6>
                    <h2 class="h3 tt-uppercase mt0">Flexible solutions</h2>
                    <div class="fancy-sep ta-left"><span></span></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga sunt, quo placeat illum nam adipisci, deleniti perspiciatis ut, nesciunt numquam voluptatum vero quam dolore. Excepturi repellendus esse, nam beatae necessitatibus veniam ratione culpa, fugiat veritatis deleniti.</p>
                    <p>Dolore ipsum, saepe autem delectus facere minus aut iusto molestiae neque dolores soluta, quibusdam atque ad?</p>
                </div>
            </div>
            <div class="feature-block odd">
                <div class="feature-block-image">
                    <img src="{{asset('frontend')}}/images/features-chat.png" alt="features">
                </div>
                <div class="feature-block-content">
                    <h6 class="subtitle mt0 weak-color tt-uppercase">Premium support</h6>
                    <h2 class="h3 tt-uppercase mt0">Your feedback, our convenient</h2>
                    <div class="fancy-sep ta-left"><span></span></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias eum dolore quasi libero dolorem, fuga, mollitia veniam quisquam numquam non vitae a eveniet officiis omnis. Quia aliquid harum esse perspiciatis vitae.</p>
                    <p>Molestias earum, animi minima incidunt dolor natus dolores voluptatum. Optio obcaecati modi, magni corrupti porro molestiae! Quam sunt, officia. Maiores, molestias.</p>
                </div>
            </div>
        </div>
    </section>
</div><!-- #scontent -->

@endsection