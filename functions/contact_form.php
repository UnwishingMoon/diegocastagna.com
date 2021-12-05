<?php
if (empty($_REQUEST["g-recaptcha-response"]) || empty($_REQUEST['name']) || empty($_REQUEST['email'])) {
    echo "error";
    exit;
}

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/generic_functions.php";
require_once __DIR__ . "/../libs/SMTPMail.class.php";

$userToken = $_REQUEST["g-recaptcha-response"];
$userIp = $_SERVER["REMOTE_ADDR"];

$name = $_REQUEST["name"];
$email = $_REQUEST["email"];

// Verify captcha
$url = "https://www.google.com/recaptcha/api/siteverify";
$secretKey = "";

$ch = curl_init($url);
curl_setopt_array($ch, array(
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => array(
        "secret" => $secretKey,
        "response" => $userToken,
        "remoteip" => $userIp
    ),
    CURLOPT_RETURNTRANSFER => true
));
$response = json_decode(curl_exec($ch), true);

if ($response["success"] == true) {
    if (($response["hostname"] == "www.diegocastagna.com" || $response["hostname"] == "diegocastagna.com") && !isset($response["error-codes"])) {
        $mail = new SMTPMail();

        $message = "From: $name ($email)\n\n";
        $message .= !empty($_REQUEST['message']) ? $_REQUEST['message'] : "";
        $from = "website@diegocastagna.com";
        $to = 'diego@diegocastagna.com';
        $subject = 'Contact From My Website';

        // Saving to database
        $query = "INSERT INTO contacts SET
        con_name=?,
        con_email=?,
        con_message=?,
        con_user_ip=?,
        con_user_gtoken=?";
        $stmt = DBC::$conn->prepare($query);
        $stmt->bind_param('sssss', $name, $email, $message, $userIp, $userToken);
        $stmt->execute();

        if($mail->sendSendinblue($from, $to, $subject, $message)){
            echo "success";
            exit;
        }
    }
}
echo "error";
