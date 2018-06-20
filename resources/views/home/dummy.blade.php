<!DOCTYPE html>
<html>

<head>
    <title>

    </title>
</head>

<body>
    <script>
        $(document).ready(function () {
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '2003668823296017',
                    cookie: true,
                    xfbml: true,
                    version: 'v3.0'
                });

                FB.AppEvents.logPageView();

            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        });

        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });

        function checkLoginState() {
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });
        }

    </script>

    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
    </fb:login-button>
    asdasdk
</body>

</html>
