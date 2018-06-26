@extends("home.layout")

@section("title", "Trang chủ")

@section("content")

<!-- hero -->
<section class="jumbotron-two">

    <div class="container">

        <div class="row align-items-center">
            <div class="col-12 col-md-5">
                <h1 class="display-5">{{ $keyword['website.homepage.section1.title']['content'] }}</h1>
                <p class="text-muted mb-3">{{ $keyword['website.homepage.section1.subtitle1']['content'] }}<br><br>{{ $keyword['website.homepage.section1.subtitle2']['content'] }}</p>
                <p>
                    <a href="#signup" class="btn btn-xl btn-primary">{{ $keyword['website.homepage.section1.getstarted_button']['content'] }}</a>
                </p>

            </div>
            <div class="col-12 col-md-7 my-3 my-md-lg">

                <div class="youtube cast-shadow" data-video-id="rm5sdAYCqqc" data-params="modestbranding=1&amp;showinfo=0&amp;controls=1&amp;vq=hd720">
                    <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1529570017i7WAXS0swIbEM5X.png" alt="image" class="img-fluid">
                    <div class="play"><span class="pe-7s-play pe-3x"></span></div>
                </div>
            </div>
        </div>

    </div>

</section>
<!-- // end hero -->


<div class="bg-shape"></div>
<div class="bg-circle"></div>
<div class="bg-circle-two"></div>

</header>
<!--<div class="section" id="intro">-->
<!--<div class="container">-->

    <!--<div class="client-logos text-center">-->
        <!--<p class="text-muted">TRUSTED BY MOST POPULAR BRANDS</p>-->

        <!--<img src="images/client_logo_1.png" alt="client logo" />-->
        <!--<img src="images/client_logo_2.png" alt="client logo" />-->
        <!--<img src="images/client_logo_3.png" alt="client logo" />-->
        <!--<img src="images/client_logo_4.png" alt="client logo" />-->
        <!--<img src="images/client_logo_5.png" alt="client logo" />-->
        <!--<img src="images/client_logo_6.png" alt="client logo" />-->
        <!--<img src="images/client_logo_7.png" alt="client logo" />-->
        <!--<img src="images/client_logo_8.png" alt="client logo" />-->
        <!--<img src="images/client_logo_9.png" alt="client logo" />-->
        <!--<img src="images/client_logo_10.png" alt="client logo" />-->

    <!--</div>-->
    <!--&lt;!&ndash; // end .client-logos &ndash;&gt;-->

<!--</div>-->
<!--&lt;!&ndash; // end .container &ndash;&gt;-->
<!--</div>-->
<!-- // end #services.section -->
<div class="section bg-light pt-lg">
<div class="container">

    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="media mb-5">
                <div class="media-icon d-flex mr-3"> <i class="pe-7s-paint-bucket pe-3x"></i> </div>
                <!-- // end .di -->
                <div class="media-body">
                    <h5 class="mt-0">{{ $keyword['website.homepage.section2.feature1_title']['content'] }}</h5> {{ $keyword['website.homepage.section2.feature1_content']['content'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="media mb-5">
                <div class="media-icon d-flex mr-3"> <i class="pe-7s-rocket pe-3x"></i> </div>
                <!-- // end .di -->
                <div class="media-body">
                    <h5 class="mt-0">{{ $keyword['website.homepage.section2.feature2_title']['content'] }}</h5> {{ $keyword['website.homepage.section2.feature2_content']['content'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="media mb-5">
                <div class="media-icon d-flex mr-3"> <i class="pe-7s-piggy pe-3x"></i> </div>
                <!-- // end .di -->
                <div class="media-body">
                    <h5 class="mt-0">{{ $keyword['website.homepage.section2.feature3_title']['content'] }}</h5> {{ $keyword['website.homepage.section2.feature3_content']['content'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="media mb-5">
                <div class="media-icon d-flex mr-3"> <i class="pe-7s-cloud-upload pe-3x"></i> </div>
                <!-- // end .di -->
                <div class="media-body">
                    <h5 class="mt-0">{{ $keyword['website.homepage.section2.feature4_title']['content'] }}</h5> {{ $keyword['website.homepage.section2.feature4_content']['content'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="media mb-5">
                <div class="media-icon d-flex mr-3"> <i class="pe-7s-science pe-3x"></i> </div>
                <!-- // end .di -->
                <div class="media-body">
                    <h5 class="mt-0">{{ $keyword['website.homepage.section2.feature5_title']['content'] }}</h5> {{ $keyword['website.homepage.section2.feature5_content']['content'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="media mb-5">
                <div class="media-icon d-flex mr-3"> <i class="pe-7s-like2 pe-3x"></i> </div>
                <!-- // end .di -->
                <div class="media-body">
                    <h5 class="mt-0">{{ $keyword['website.homepage.section2.feature6_title']['content'] }}</h5> {{ $keyword['website.homepage.section2.feature6_content']['content'] }}
                </div>
            </div>
        </div>
        <!-- // end .col -->
    </div>
</div>
</div>

<!-- Features -->
<div class="section" id="features">

<div class="container">
    <div class="row align-items-center">
        <div class="col-sm-8">
            <div class="browser-window limit-height my-5 mr-0 mr-sm-5">
                <div class="top-bar">
                    <div class="circles">
                        <div class="circle circle-red"></div>
                        <div class="circle circle-yellow"></div>
                        <div class="circle circle-blue"></div>
                    </div>
                </div>
                <div class="content">
                    <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1529571355AnyHmFZcGSEoEvO.png" alt="image">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="media">
                <div class="media-body">
                    <div class="media-icon mb-3"> <i class="pe-7s-like2 pe-3x"></i> </div>
                    <h3 class="mt-0">{{ $keyword['website.homepage.section3.block1_title']['content'] }}</h3>
                    <p> {{ $keyword['website.homepage.section3.block1_content']['content'] }}</p>
                </div>
            </div>
        </div>

    </div>



    <div class="row align-items-center mt-5">

        <div class="col-sm-4">
            <div class="media">
                <div class="media-body">
                    <div class="media-icon mb-3"> <i class="pe-7s-graph1 pe-3x"></i> </div>
                    <h3 class="mt-0">{{ $keyword['website.homepage.section3.block2_title']['content'] }}</h3>
                    <p> {{ $keyword['website.homepage.section3.block2_content']['content'] }}</p>
                </div>
            </div>
        </div>


        <div class="col-sm-8">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1529571355E3RnMMD6Ila4wsO.png" alt="image" class="img-fluid cast-shadow my-5">
        </div>


    </div>
</div>



</div>



<!-- features -->


<div class="section bg-light py-lg">
<div class="container">

    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="media">

                <!-- // end .di -->
                <div class="media-body text-center">
                    <div class="color-icon mb-3"> <i class="pe-7s-medal pe-3x"></i> </div>
                    <h5 class="mt-0">{{ $keyword['website.homepage.section4.feature1_title']['content'] }}</h5> {{ $keyword['website.homepage.section4.feature1_content']['content'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="media">
                <!-- // end .di -->
                <div class="media-body text-center">
                    <div class="color-icon mb-3"> <i class="pe-7s-diamond pe-3x"></i> </div>
                    <h5 class="mt-0">{{ $keyword['website.homepage.section4.feature2_title']['content'] }}</h5> {{ $keyword['website.homepage.section4.feature2_content']['content'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="media">
                <!-- // end .di -->
                <div class="media-body text-center">
                    <div class="color-icon mb-3"> <i class="pe-7s-cloud-upload pe-3x"></i> </div>
                    <h5 class="mt-0">{{ $keyword['website.homepage.section4.feature3_title']['content'] }}</h5>{{ $keyword['website.homepage.section4.feature3_content']['content'] }}
                </div>
            </div>
        </div>


    </div>
</div>
</div>

<!-- // end features -->



<!--&lt;!&ndash; Testimonials &ndash;&gt;-->
<!--<div class="section">-->
<!--<div class="container">-->
    <!--<div class="section-title text-center">-->
        <!--<h3>What our users say</h3>-->
        <!--<p>They love it. Read what our customers had to say!</p>-->
    <!--</div>-->

    <!--<div class="row">-->
        <!--<div class="col-md-4">-->
            <!--<div class="embed-tweet-item">-->
                <!--<blockquote class="twitter-tweet" data-cards="hidden" lang="en" data-width="550" data-link-color="#7642FF" data-align="center">-->
                    <!--<a href="https://twitter.com/kmin/status/943914224329347072"></a>-->
                <!--</blockquote>-->
            <!--</div>-->
            <!--&lt;!&ndash; end .embed-tweet-item &ndash;&gt;-->
        <!--</div>-->
        <!--&lt;!&ndash; end .col &ndash;&gt;-->
        <!--<div class="col-md-4">-->
            <!--<div class="embed-tweet-item">-->
                <!--<blockquote class="twitter-tweet" data-cards="hidden" lang="en" data-width="550" data-link-color="#7642FF" data-align="center">-->
                    <!--<a href="https://twitter.com/halarewich/status/954224121784688640"></a>-->
                <!--</blockquote>-->
            <!--</div>-->
            <!--&lt;!&ndash; end .embed-tweet-item &ndash;&gt;-->
        <!--</div>-->
        <!--&lt;!&ndash; end .col &ndash;&gt;-->
        <!--<div class="col-md-4">-->
            <!--<div class="embed-tweet-item">-->
                <!--<blockquote class="twitter-tweet" data-cards="hidden" lang="en" data-width="550" data-link-color="#7642FF" data-align="center">-->
                    <!--<a href="https://twitter.com/scottbelsky/status/921417663859052544"></a>-->
                <!--</blockquote>-->
            <!--</div>-->
            <!--&lt;!&ndash; end .embed-tweet-item &ndash;&gt;-->
        <!--</div>-->
        <!--&lt;!&ndash; end .col &ndash;&gt;-->
    <!--</div>-->
    <!--&lt;!&ndash; end .row &ndash;&gt;-->


<!--</div>-->
<!--</div>-->
<!--&lt;!&ndash; // end Testimonials &ndash;&gt;-->




<!--&lt;!&ndash; Pricing &ndash;&gt;-->
<!--<div class="section bg-light py-lg" id="pricing">-->
<!--<div class="container">-->

    <!--<div class="section-title text-center mt-0 mb-5">-->
        <!--<h3>Choose your plan</h3>-->
        <!--<p>Simple pricing. no hidden charges. Choose a plan fit your needs</p>-->
    <!--</div>-->

    <!--<div class="row">-->
        <!--<div class="col-lg-4">-->
            <!--<div class="card pricing">-->
                <!--<div class="card-body">-->
                    <!--<small class="text-muted">PERSONAL</small>-->
                    <!--<h5 class="card-title">$9</h5>-->
                    <!--<p class="card-text">-->
                        <!--<ul class="list-unstyled">-->
                            <!--<li>3 Projects</li>-->
                            <!--<li class="plan-muted">Team Collaboration</li>-->
                            <!--<li class="plan-muted">Analytics &amp; Reports</li>-->
                            <!--<li>One user</li>-->
                        <!--</ul>-->
                    <!--</p>-->
                    <!--<a href="#" class="btn btn-xl btn-outline-primary">Choose this plan</a>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="col-lg-4">-->
            <!--<div class="card pricing">-->
                <!--<div class="card-body">-->
                    <!--<small class="text-muted">STARTUP</small>-->
                    <!--<h5 class="card-title">$29</h5>-->
                    <!--<p class="card-text">-->
                        <!--<ul class="list-unstyled">-->
                            <!--<li>20 Projects</li>-->
                            <!--<li>Team Collaboration</li>-->
                            <!--<li>Analytics &amp; Reports</li>-->
                            <!--<li>10 Active users</li>-->
                        <!--</ul>-->
                    <!--</p>-->
                    <!--<a href="#" class="btn btn-xl btn-primary">Choose this plan</a>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="col-lg-4">-->
            <!--<div class="card pricing">-->
                <!--<div class="card-body">-->
                    <!--<small class="text-muted">ENTERPRISE</small>-->
                    <!--<h5 class="card-title">$149</h5>-->
                    <!--<p class="card-text">-->
                        <!--<ul class="list-unstyled">-->
                            <!--<li>Unlimited Projects</li>-->
                            <!--<li>Team Collaboration</li>-->
                            <!--<li>Analytics &amp; Reports</li>-->
                            <!--<li>Priority Support</li>-->
                        <!--</ul>-->
                    <!--</p>-->
                    <!--<a href="#" class="btn btn-xl btn-outline-primary">Choose this plan</a>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

<!--</div>-->
<!--</div>-->

<!--&lt;!&ndash; // end Pricing &ndash;&gt;-->

<!-- Signup -->
<div class="section" id="signup">
<div class="container">
    <div class="section-title text-center">
        <h3>{{ $keyword['website.homepage.section5.signup_title']['content'] }}</h3>
        <p>{{ $keyword['website.homepage.section5.signup_subtitle']['content'] }}</p>
    </div>
    <div class="row justify-content-md-center">
        <div class="col col-md-5">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="{{ $keyword['website.homepage.section5.signup_fullname']['content'] }}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="{{ $keyword['website.homepage.section5.signup_email']['content'] }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="{{ $keyword['website.homepage.section5.signup_password']['content'] }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-xl btn-block btn-primary">{{ $keyword['website.homepage.section5.signup_button']['content'] }}</button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>

@endsection