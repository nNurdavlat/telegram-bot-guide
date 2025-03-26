<?php

$method->makeRequest('sendPhoto', [
    'chat_id' => $cid,
    'photo' => $photo,
]);
exit;