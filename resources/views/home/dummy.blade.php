<html>

<head>
    <meta name="google-signin-client_id" content="495439088808-1451ltmfth2pm0vgahhc715kphpauvqs.apps.googleusercontent.com">
</head>

<body>
<div>Test</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script>
        // var socket = io('http://localhost:9000');
        var socket = io('https://atomuser.com:9000');
        socket.on("channel:event", function (data) {
            console.log(data);
        });
    </script>

{{--<script>--}}
{{--function onSuccess(googleUser) {--}}
{{--console.log(googleUser);--}}
{{--console.log('Logged in as: ' + googleUser.getBasicProfile().getName());--}}
{{--}--}}
{{----}}
{{--function onSignIn(googleUser) {--}}
{{--console.log(googleUser);--}}
{{--}--}}

{{--function onFailure(error) {--}}
{{--console.log(error);--}}
{{--}--}}

{{--function renderButton() {--}}
{{--gapi.signin2.render('my-signin2', {--}}
{{--'scope': 'profile email',--}}
{{--'width': 240,--}}
{{--'height': 50,--}}
{{--'longtitle': true,--}}
{{--'theme': 'dark',--}}
{{--'onsuccess': onSuccess,--}}
{{--'onfailure': onFailure--}}
{{--});--}}
{{--}--}}

{{--</script>--}}

{{--<script src="https://apis.google.com/js/platform.js" async defer></script>--}}
</body>

</html>
