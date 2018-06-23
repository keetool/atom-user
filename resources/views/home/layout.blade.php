
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Product+Sans:300,400,700" rel="stylesheet">
    <!-- build:css css/app.min.css -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="landing-page/assets/css/global/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="landing-page/assets/css/global/plugins/icon-font.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="landing-page/assets/css/style.css">
    <!-- /build -->
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="https://d1j8r0kxyu9tj8.cloudfront.net/files/1529571679WLoLVlC4nzjl0yd.png">
</head>
<body class="overflow-hidden">
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
                        <li class="nav-item">
                            <a class="nav-link" href="/#features">Features</a>
                        </li>
                        <!--<li class="nav-item">-->
                            <!--<a class="nav-link" href="#pricing">Pricing</a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="blogs">Blog</a>
                        </li>
                        {{-- {{dd($locale)}} --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{trans("app.docs")}}</a>
                        </li>

                        <li class="nav-item text-center">
                            <a href="/#signup" class="btn align-middle btn-outline-primary my-2 my-lg-0">Login</a>
                        </li>
                        <li class="nav-item text-center">
                            <a href="/#signup" class="btn align-middle btn-primary my-2 my-lg-0">Sign Up</a>
                        </li>
                    </ul>

                </di>
            </div>
        </nav>
        <!-- // end navbar -->

@yield("content")

<div class="section bg-light mt-4" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"> <img src="https://d1j8r0kxyu9tj8.cloudfront.net/files/1529570270K2KtqY6J6FZb1lr.png" class="logo-dark" height="25px" />
                <p class="mt-3 ml-1 text-muted">Start.ly is a SASS software landing page template. </p>
                <p class="ml-1"><a href="https://themeforest.net/user/surjithctly/portfolio?ref=surjithctly&utm_source=footer_content" target="_blank">Purchase now →</a></p>
                <!-- // end .lead -->
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#">Terms</a></li>
                    <li><a href="#about">Privacy</a></li>
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
                    <select class="btn btn-sm ml-1" style="background: transparent; border: 1px solid #7642FF; color: #7642FF" id="languageSwitcher">
                        <option>en</option>
                        <option>vi</option>
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

<script type="text/javascript">
    $(document).ready(function () {
        //Change Language
        
        $('#languageSwitcher').change(function (e) { 
            e.preventDefault();
            // console.log(1);
            // console.log($('meta[name="csrf-token"]').attr('content'));
            var locale = $(this).val();
            var _token = $('meta[name="csrf-token"]').attr('content');

            var url = "/change-language";
            var data = {
                locale: locale,
                _token: _token
            }
            var config = {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
            
            axios.post(url, data, config)
            .then((response) => {
                console.log(response);
                window.location.reload(true);
            })
            .catch((error) => {
                console.log(error);
            })
        });        
    });
</script>


@yield("script")
<style>
    .atomuser {
        position: fixed;
        bottom: 40px;
        right: 40px;
    }

    .atomuser-fab {
        width: 80px;
        height: 80px;
        background-color: #0087ea;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        float: right;
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

    .atomuser-close:hover {
        opacity: 1;
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

    .atomuser > .atomuser-iframe {
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -o-border-radius: 10px;
        overflow: hidden;
        margin-bottom: 30px;
        width: 400px;
        height: 500px;
        /*-moz-box-shadow: 0 0 3px #ccc;*/
        /*-webkit-box-shadow: 0 0 3px #ccc;*/
        /*box-shadow: 0 0 3px #ccc;*/
        filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.15));
    }

    .atomuser-iframe > iframe {
        width: 400px;
        height: 500px;
        /*border: none;*/
        /*padding: 0;*/

    }

    .atomuser-iframe > iframe.show {
        display: block;
    }

    .atomuser-iframe > iframe.hide {
        display: none;
    }


</style>
<div class="atomuser">
    <div class="atomuser-iframe">
        <iframe class="hide" id="atomuser-iframe" src="https://k.atomuser.com" frameBorder="0">
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


        document.getElementById('atomuser-iframe').classList.remove('hide');
        document.getElementById('atomuser-iframe').classList.add('show');
    }

    function closeIframe() {

        document.getElementById('atomuser-iframe').classList.remove('show');
        document.getElementById('atomuser-iframe').classList.add('hide');
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

</html>