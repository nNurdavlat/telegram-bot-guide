<?php
require_once __DIR__ . '/vendor/autoload.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


require 'Methods.php';

$method = new Methods();

$update = json_decode(file_get_contents('php://input'));

$message = $update->message;
$cid = $message->chat->id;
$txt = $update->message->text;
$messageId = $update->message->message_id; // User yuborgan xabarni ID si
$name = $message->chat->first_name;
$user_name = $message->chat->username;

if ($txt=="/start") {
    $method->makeRequest('sendMessage', [
        'chat_id' => $cid,
        'text' => $txt
    ]);
}