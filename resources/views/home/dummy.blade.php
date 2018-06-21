<!DOCTYPE html>
<html>
    <head>
        <title>
            <meta name="google-signin-client_id" content="141997092589-lg3mgdl45p1t9t65qegltg0m1b6tlchd.apps.googleusercontent.com">
        </title>
    </head>
    <body>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
            appId      : '2003668823296017',
            cookie     : true,
            xfbml      : true,
            version    : 'v3.0'
            });

            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function statusChangeCallback(response) {
            console.log(response);
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }  
    </script>

        <fb:login-button 
            scope="public_profile,email"
            onlogin="checkLoginState();">
        </fb:login-button>
        asdasdk
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </body>
    
</html>