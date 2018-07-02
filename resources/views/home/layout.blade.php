
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <title>KEE TOOL - @yield('title')</title> --}}
    <title>atomuser - build your own community</title>
    <!-- Meta Share -->
    <meta property="og:title" content="atomuser - build your own community" />
    <meta property="og:type" content="website" />
    <meta property="og:type" content="website" />

    <meta property="og:image" content="http://d1j8r0kxyu9tj8.cloudfront.net/files/1529571594AvZvBrjZQSIwaNT.png" />
    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Product+Sans:300,400,700" rel="stylesheet">
    <!-- build:css css/app.min.css -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="landing-page/assets/css/global/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="landing-page/assets/css/global/plugins/icon-font.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="landing-page/assets/css/style.css">
    <link rel="stylesheet" href="landing-page/assets/css/atomuser.css">

    <!-- /build -->
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="https://d1j8r0kxyu9tj8.cloudfront.net/files/1529571679WLoLVlC4nzjl0yd.png">
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({‘gtm.start’:
        new Date().getTime(),event:‘gtm.js’});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!=‘dataLayer’?‘&l=‘+l:‘’;j.async=true;j.src=
        ’https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,‘script’,‘dataLayer’,‘GTM-M6L5HXR’);
    </script>
    <!-- End Google Tag Manager -->
</head>
<body class="overflow-hidden">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M6L5HXR" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header id="home">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="https://d1j8r0kxyu9tj8.cloudfront.net/files/1529570270K2KtqY6J6FZb1lr.png" height="40px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse" id="site-nav">
                    <ul class="navbar-nav text-sm-left ml-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/#features">Features</a>
                        </li> --}}
                        <!--<li class="nav-item">-->
                            <!--<a class="nav-link" href="#pricing">Pricing</a>-->
                        <!--</li>-->
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="blogs">Blog</a>
                        </li> --}}

                        <!--<li class="nav-item dropdown">-->
                            <!--<a class="nav-link" href="#" data-toggle="dropdown">Pages <span class="pe-2x pe-7s-angle-down"></span>  </a>-->
                            <!--<div class="dropdown-menu">-->
                                <!--<a class="dropdown-item" href="index-two.html">Landing Style Two</a>-->
                                <!--<a class="dropdown-item" href="blog.html">Blog Page</a>-->
                                <!--<a class="dropdown-item" href="blog-single.html">Blog Single</a>-->
                            <!--</div>-->
                        <!--</li>-->
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Docs</a>
                        </li> --}}

                        <li class="nav-item text-center">
                            <a href="/free-trial" class="btn align-middle btn-outline-primary my-2 my-lg-0">REGISTER</a>
                        </li>
                        <li class="nav-item text-center">
                            <a href="/access-dashboard" class="btn align-middle btn-primary my-2 my-lg-0">YOUR DASHBOARD</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- // end navbar -->

@yield("content")

<div class="section bg-light mt-4" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"> <img src="https://d1j8r0kxyu9tj8.cloudfront.net/files/1529570270K2KtqY6J6FZb1lr.png" class="logo-dark" height="25px" />
                <br/><br/>
                {{-- <p class="mt-3 ml-1 text-muted">Start.ly is a SASS software landing page template. </p> --}}
                <p class="ml-1"><a href="{{url('/free-trial')}}">Register now →</a></p>
                <!-- // end .lead -->
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Linkedin</a></li>
                </ul>
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <a href="#home" class="btn btn-sm btn-outline-primary ml-1">Go to Top</a>
                <div class="nav-item" style="margin-top: 10px;">
                    <select onchange="location = this.value;" class="btn btn-sm ml-1" style="background: transparent; border: 1px solid #7642FF; color: #7642FF" id="languageSwitcher">
                        @if ($lang == "vi-vn")
                        <option value="?lang=vi-vn">vi</option>
                        <option value="?lang=en-us">en</option>
                        @else
                        <option value="?lang=en-us">en</option>
                        <option value="?lang=vi-vn">vi</option>
                        @endif
                    </select>
                </div>
            </div>
            <!-- // end .col-sm-3 -->
        </div>
        <!-- // end .row -->
        <div class=" text-center mt-4"> <small class="text-muted">Copyright ©
                      <script type="text/javascript">
                      document.write(new Date().getFullYear());
                      </script>
                      All rights reserved. KEETOOL
                  </small></div>
    </div>
    <!-- // end .container -->
</div>
<!-- // end #about.section -->
<!-- // end .agency -->
<!-- JS Files -->
<!-- build:js js/app.min.js -->
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="landing-page/assets/js/global/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="landing-page/assets/js/global/bootstrap.bundle.min.js"></script>
<!-- Main JS -->
<script src="landing-page/assets/js/script.js"></script>
<!-- /build -->
</body>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!--  Plugins for presentation page -->
<script src="landing-page/assets/js/presentation-page/main.js"></script>
<script src="landing-page/assets/js/presentation-page/jquery.sharrre.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>


<script type="text/javascript">
    (function() {
        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        new IsoGrid(document.querySelector('.isolayer--deco1'), {
            transform : 'translateX(33vw) translateY(-340px) rotateX(45deg) rotateZ(45deg)',
            stackItemsAnimation : {
                properties : function(pos) {
                    return {
                        translateZ: (pos+1) * 30,
                        rotateZ: getRandomInt(-4, 4)
                    };
                },
                options : function(pos, itemstotal) {
                    return {
                        type: dynamics.bezier,
                        duration: 500,
                        points: [{"x":0,"y":0,"cp":[{"x":0.2,"y":1}]},{"x":1,"y":1,"cp":[{"x":0.3,"y":1}]}],
                        delay: (itemstotal-pos-1)*40
                    };
                }
            }
        });
    })();
</script>

@yield("script")
<style>
    .atomuser {
        position: fixed;
        bottom: 40px;
        right: 40px;
    }

    .atomuser-fab {
        transition: all .2s ease-in-out;
        width: 50px;
        height: 50px;
        background-image: linear-gradient(to top, #009efb 0%, #005bea 100%);
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        float: right;
        filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.15));
    }

    .atomuser-fab:hover {
        transform: scale(1.1);
        filter: drop-shadow(0px 0px 20px rgba(0, 0, 0, 0.15));
    }

    .atomuser-fab:hover .atomuser-close {
        opacity: 1;
    }

    .atomuser-fab > .atomuser-icon {
        width: 50%;
        height: 50%;
        background-color: white;
        border-radius: 50%;
        position: absolute;
        top: 15%;
        left: 15%;
    }

    .atomuser-fab > .atomuser-icon > .atomuser-icon-dot {
        width: 25%;
        height: 25%;
        background-color: #0087ea;
        border-radius: 50%;
        position: absolute;
        top: 20%;
        left: 20%;
    }

    .atomuser-fab > .atomuser-close {
        position: absolute;
        right: 50%;
        top: 50%;
        transform: translate(50%, -50%);
        width: 40%;
        height: 40%;
        opacity: 0.5;
    }

    .atomuser > .atomuser-iframe {
        border-radius: 10px;
        overflow: hidden;
        filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.15));
    }

    .atomuser-iframe > iframe {
        width: 350px;
        height: 500px;

    }

    .show .atomuser-iframe {
        margin-bottom: 30px;
        width: 350px;
        height: 500px;
    }

    .hide .atomuser-iframe {
        width: 0;
        height: 0;
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {

        .atomuser {
            bottom: 20px;
            right: 20px;
        }

        .show.atomuser {
            top: 20px;
            left: 20px;
        }

        .show.atomuser > .atomuser-iframe, .atomuser-iframe > iframe {
            width: 100%;
            height: 100%;
        }

        .hide .atomuser-fab {
        }

        .show .atomuser-fab {
            z-index: 999;
            position: absolute;
            top: 0px;
            right: 0px;
            width: 30px;
            height: 30px;
        }

        .show .atomuser-fab > .atomuser-close {
            width: 60%;
            height: 60%;

        }

        .atomuser-overflow-hidden {
            overflow: hidden;
            position: relative;
            height: 100%;
        }
    }

    .atomuser-close:before, .atomuser-close:after {
        position: absolute;
        left: 45%;
        content: ' ';
        height: 100%;
        width: 2px;
        background-color: white;
    }

    .atomuser-close:before {
        transform: rotate(45deg);
    }

    .atomuser-close:after {
        transform: rotate(-45deg);
    }

</style>
<div class="atomuser hide" id="atomuser">
    <div class="atomuser-iframe">
        <iframe id="atomuser-iframe" src="https://k.atomuser.com" frameBorder="0">
        </iframe>
    </div>
    <div class="atomuser-fab" id="atomuser-btn-fab">
        <div class="atomuser-icon">
            <div class="atomuser-icon-dot">
            </div>
        </div>
    </div>
</div>

<script>
    var isClosedIframe = true;

    function openIframe() {


        document.getElementById('atomuser').classList.remove('hide');
        document.getElementById('atomuser').classList.add('show');
        document.body.classList.add('atomuser-overflow-hidden');
    }

    function closeIframe() {

        document.getElementById('atomuser').classList.remove('show');
        document.body.classList.remove('atomuser-overflow-hidden');
        document.getElementById('atomuser').classList.add('hide');
    }


    document.getElementById('atomuser-btn-fab').onclick = function () {
        if (isClosedIframe) {
            this.innerHTML = '<div class="atomuser-close"/>';
            openIframe();
            isClosedIframe = false;
        } else {
            this.innerHTML = '<div class="atomuser-icon">\n' +
                '        <div class="atomuser-icon-dot">\n' +
                '        </div>\n' +
                '    </div>';
            closeIframe();
            isClosedIframe = true;
        }

    };
</script>
<script>

    var url = window.location.search;
    var languageSwitcher = document.getElementById('languageSwitcher');

    for(var i, j = 0; i = languageSwitcher.options[j]; j++) {
        if(i.value == url) {
            languageSwitcher.selectedIndex = j;
            break;
        }
    }
</script>

</html>