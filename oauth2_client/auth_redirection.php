<?php
$query = http_build_query(array(
    'client_id' => '5',
    'redirect_uri' => 'http://client.com/callback.php',
    'response_type' => 'code',
    'scope' => '',
));

header('Location: http://sso-laravel.com/oauth/authorize?'.$query);
