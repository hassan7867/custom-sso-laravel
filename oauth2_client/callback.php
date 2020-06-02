<?php
// check if the response includes authorization_code
if (isset($_REQUEST['code']) && $_REQUEST['code'])
{
    $ch = curl_init();
    $url = 'http://sso-laravel.com/oauth/token';

    $params = array(
        'grant_type' => 'authorization_code',
        'client_id' => '1',
        'client_secret' => '304c20303949184daa50d8ce3e3dfb6c8ab8692ee568594a85aa18eaca471e51ab639361fbd6ae410349f855f75de6e381b5',
        'redirect_uri' => 'http://client.com/callback.php',
        'code' => $_REQUEST['code']
    );

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $params_string = '';

    if (is_array($params) && count($params))
    {
        foreach($params as $key=>$value) {
            $params_string .= $key.'='.$value.'&';
        }

        rtrim($params_string, '&');

        curl_setopt($ch,CURLOPT_POST, count($params));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $params_string);
    }

    $result = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($result);
    echo json_encode($response);
    // check if the response includes access_token
    if (isset($response->access_token) && $response->access_token)
    {
        // you would like to store the access_token in the session though...
        $access_token = $response->access_token;

        // use above token to make further api calls in this session or until the access token expires
        $ch = curl_init();
        $url = 'http://sso-laravel.com/api/user/get';
        $header = array(
            'Authorization: Bearer '. $access_token
        );
        $query = http_build_query(array('uid' => '1'));

        curl_setopt($ch,CURLOPT_URL, $url . '?' . $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        var_dump($result);
    }
    else
    {
        echo "Error";
        // for some reason, the access_token was not available
        // debugging goes here
    }
}
