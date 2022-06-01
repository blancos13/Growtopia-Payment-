<?php
$result = "";
define("webhook_url", "https://discord.com/api/webhooks/###");
define("timestamp", date("c", strtotime("now")));
$json_data = json_encode([
    "content" => "New order received",
    "username" => "Order Bot",
    "tts" => false, //voice
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$dbhost = "localhost";
$dbname = "growbet";
$dbchar = "utf8";
$dbuser = "root";
$dbpass = "";
try {
  $pdo = new PDO(
    "mysql:host=$dbhost;dbname=$dbname;charset=$dbchar",
    $dbuser, $dbpass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $ex) { $result = $ex->getMessage(); }

if ($result=="") {
  try {
    $stmt = $pdo->prepare("INSERT INTO `orders` (`growid`, `world`, `qty`) VALUES (?,?,?)");
    $stmt->execute([$_POST["growid"], $_POST["world"], $_POST["qty"]]);
    echo $result;
  } catch (Exception $ex) { $result = $ex->getMessage(); }
}

//discord things
if ($result=="") {
  $ch = curl_init(webhook_url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
  $response = curl_exec($ch);
  echo $response;
  curl_close($ch);  
}

