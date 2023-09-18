<?php

function sendNotification()
{
    $token = "e-UA0D6wtUqD3-oU8KvOKe:APA91bEHFlRSof5TUbfSugL16cT12wlT0A3AEWR6ysxoh7HqSKj6bipVIfhP_0ozxejjUiJfnF-6p8jX0QOrMKceaR-2iB87aHRuO1l2TqABwyqrc1Wnw86ZLr8pOt8IGJklRXH9pc83";

    // $servername = "ohunm00fjsjs1uzy.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    // $username = "v0h3pl258xmt356y";
    // $password = "cif5nuy3j0hlcss5";

    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=josy3q3xndpze9js", $username, $password);
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connected successfully";

    //     $sql = "INSERT INTO token (userID, tokenID)
    //     VALUES ('DVS', $token)";

    //     if ($conn->query($sql) === TRUE) {
    //         echo "New record created successfully";
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    // } catch (PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    // }








    // $token = $_POST['token'];
    $message = $_POST['message'];
    $title = $_POST['title'];
    $icon = $_POST['icon'];
    $url = "https://fcm.googleapis.com/fcm/send";
    $fields = array(
        "to" => $token,
        "notification" => array(
            "body" => $message,
            "title" => $title,
            "icon" => $icon,
            "click_action" => "https://google.com"
        )
    );

    $headers = array(
        'Authorization: key=AAAA35ok5cw:APA91bFDnVevrzz4mOCjHJGKPhbSXPWJX8XJLVqLM4Gk2Ambv67STL2TBjmL9QPPWyj_86zvVTvT_LsgT5NAWjgZjAs7eB_kqU2QZ5gxAoCf3-Vpb7LUrn_WGIUE2xRwiya3s3E3cLS7',
        'Content-Type:application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    // print_r($result);
    curl_close($ch);
}

sendNotification();
