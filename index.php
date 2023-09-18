<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hello, My name is HieuLN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php
        if (isset($_POST['button'])) {
            include 'send_notification.php';
        }
    ?>

    <div class="container">
        <h2>Firebase Web Push Notification Example</h2>
        <form method="post" class="mt-5">
            <input type="hidden" name="token" id="token">

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="mb-3">
                <label for="Message" class="form-label fw-bold">Message:</label>
                <input type="text" class="form-control" name="message" id="message">
            </div>

            <input type="hidden" name="icon" id="icon" value="">
            <input type="submit" class="btn btn-primary" name="button" value="Send notification" />
        </form>
    </div>

    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
    <script>

        var firebaseConfig = {
            apiKey: "AIzaSyCytjAGyKbBtVsABZygJe3FBOooaCg4boM",
            authDomain: "dvstest-f401a.firebaseapp.com",
            projectId: "dvstest-f401a",
            storageBucket: "dvstest-f401a.appspot.com",
            messagingSenderId: "960363816396",
            appId: "1:960363816396:web:bf87fc8d157732f4bfa969",
            measurementId: "G-VR78HJDGLE"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function IntitalizeFireBaseMessaging() {
            messaging
                .requestPermission()
                .then(function() {
                    console.log("Notification Permission");
                    return messaging.getToken();
                })
                .then(function(token) {
                    console.log("Token : " + token);
                    document.getElementById("token").value = token;
                })
                .catch(function(reason) {
                    console.log(reason);
                });
        }

        messaging.onMessage(function(payload) {
            console.log(payload);
            const notificationOption = {
                body: payload.notification.body,
                icon: payload.notification.icon
            };

            if (Notification.permission === "granted") {
                var notification = new Notification(payload.notification.title, notificationOption);

                notification.onclick = function(ev) {
                    ev.preventDefault();
                    window.open(payload.notification.click_action, '_blank');
                    notification.close();
                }
            }

        });

        messaging.onTokenRefresh(function() {
            messaging.getToken()
                .then(function(newtoken) {
                    console.log("New Token : " + newtoken);
                })
                .catch(function(reason) {
                    console.log(reason);
                })
        })
        IntitalizeFireBaseMessaging();
    </script>
</body>

</html>