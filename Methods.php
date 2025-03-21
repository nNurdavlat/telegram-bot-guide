<?php
require 'DB.php';
class Methods
{
    const  API_URL = 'https://api.telegram.org/bot';
    public function makeRequest($method, $data=[])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL . $_ENV['BOT_TOKEN'] . '/' . $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $responses = curl_exec($ch);
        curl_close($ch);
        return json_decode($responses);  // WE ARE RETURNING THE RESPONSE SENT BY THE BOT. THE USER'S MESSAGE IS VISIBLE IN NGROK.
    }
}