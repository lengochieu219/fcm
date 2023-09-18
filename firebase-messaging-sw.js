importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

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
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});