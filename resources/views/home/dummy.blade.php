<html>

<head>
    <meta name="google-signin-client_id" content="495439088808-1451ltmfth2pm0vgahhc715kphpauvqs.apps.googleusercontent.com">
</head>

<body>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <script>
        function onSuccess(googleUser) {
            console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
        }

        function onFailure(error) {
            console.log(error);
        }

        function renderButton() {
            gapi.signin2.render('my-signin2', {
                'scope': 'profile email',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }

    </script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>
