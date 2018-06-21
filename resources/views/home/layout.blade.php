
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KEE TOOL - @yield('title')</title>

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
</head>

<body class="overflow-hidden">
    <header id="home">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h3 class="gradient-mask">Start.ly</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse" id="site-nav">
                    <ul class="navbar-nav text-sm-left ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown">Pages <span class="pe-2x pe-7s-angle-down"></span>  </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index-two.html">Landing Style Two</a>
                                <a class="dropdown-item" href="blog.html">Blog Page</a>
                                <a class="dropdown-item" href="blog-single.html">Blog Single</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li>

                        <li class="nav-item text-center">
                            <a href="#signup" class="btn align-middle btn-outline-primary my-2 my-lg-0">Login</a>
                        </li>
                        <li class="nav-item text-center">
                            <a href="#signup" class="btn align-middle btn-primary my-2 my-lg-0">Sign Up</a>
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
            <div class="col-sm-4"> <img src="landing-page/assets/images/global/logo-dark.svg" class="logo-dark" alt="Start.ly Logo" />
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
            </div>
            <!-- // end .col-sm-3 -->
        </div>
        <!-- // end .row -->
        <div class=" text-center mt-4"> <small class="text-muted">Copyright ©
                      <script type="text/javascript">
                      document.write(new Date().getFullYear());
                      </script>
                      All rights reserved. Start.ly
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

</html>