
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link href="https://d255zuevr6tr8p.cloudfront.net/build-social/vendors~main.39e2843c555ce5b43b1c.chunk.css"
          rel="stylesheet">
    <link href="https://d255zuevr6tr8p.cloudfront.net/build-social/main.1f13a4f31f46c3caa547.css" rel="stylesheet">
</head>
<body>
<div id="fb-root"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
<script>
    // var socket = io('http://localhost:9000');
    var socket = io('https://atomuser.com:9000');
    socket.on("channel-name:App\\Events\\EventBroadcasted", function(data) {
        // notify user
    });

    socket.on("channel-name:App\\Events\\AnotherEventBroadcasted", function(data) {
        // another notification
    });
</script>
<script>!function (e, t, n) {
    var o, s = e.getElementsByTagName(t)[0];
    e.getElementById(n) || ((o = e.createElement(t)).id = n, o.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=2003668823296017&autoLogAppEvents=1", s.parentNode.insertBefore(o, s));
}(document, "script", "facebook-jssdk");</script>
<div id="app"></div>
<script type="text/javascript"
        src="https://d255zuevr6tr8p.cloudfront.net/build-social/vendors~main.5af497e541163275bb82.chunk.js"></script>
<script type="text/javascript"
        src="https://d255zuevr6tr8p.cloudfront.net/build-social/main.5af497e541163275bb82.js"></script>
</body>
</html>