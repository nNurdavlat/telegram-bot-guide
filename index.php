<?php
require_once __DIR__ . '/vendor/autoload.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


require 'Methods.php';

$method = new Methods();

$update = json_decode(file_get_contents('php://input'));

if (isset($update)) {
    $message = $update->message;
    $cid = $message->chat->id;
    $txt = $update->message->text;
    $messageId = $update->message->message_id; // User yuborgan xabarni ID si
    $name = $message->chat->first_name;
    $user_name = $message->chat->username;
    $photo = $_ENV['PHOTO_ADDRESS'];
    $audio = $_ENV['AUDIO_ADDRESS'];
    $document = $_ENV['DOCUMENT_ADDRESS'];
}

$txt = trim($txt); // Remove spaces
$fileAvailable = __DIR__ . "/Available methods/" . $txt . ".php"; // Generate the full path dynamically.

if (file_exists($fileAvailable)) {
    require_once($fileAvailable);
} else {
    $method->makeRequest('sendMessage', [
        'chat_id' => $cid,
        'text' => "File not found: " . $txt . ".php",
    ]);
}