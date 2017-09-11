<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Linkedin {

    function __construct(){
    }

    public function getAuthorizationCode() {
        $params = array('response_type' => 'code',
            'client_id' => API_KEY,
            'scope' => SCOPE,
            'state' => uniqid('', true), // unique long string
            'redirect_uri' => REDIRECT_URI,
        );
        // Authentication request
        $url = 'https://www.linkedin.com/uas/oauth2/authorization?' . http_build_query($params);

        // Needed to identify request when it returns to us
        $_SESSION['state'] = $params['state'];
        // Redirect user to authenticate
        header("Location: $url");
        exit;
    }

     public function getAccessToken() {
        $params = array('grant_type' => 'authorization_code',
            'client_id' => API_KEY,
            'client_secret' => API_SECRET,
            'code' => $_GET['code'],
            'redirect_uri' => REDIRECT_URI,
        );
        // Access Token request
        $url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . http_build_query($params);

        // Tell streams to make a POST request
        $context = stream_context_create(
                array('http' =>
                    array('method' => 'POST',
                    )
                )
        );

        // Retrieve access token information
        $response = file_get_contents($url, false, $context);

        // Native PHP object, please
        $token = json_decode($response);

        // Store access token and expiration time
        $_SESSION['access_token'] = $token->access_token; // guard this! 
        $_SESSION['expires_in'] = $token->expires_in; // relative time (in seconds)
        $_SESSION['expires_at'] = time() + $_SESSION['expires_in']; // absolute time
        //var_dump($_SESSION);
        return true;
    }

    function fetch($method, $resource, $body = '') {
    $opts = array(
        'http' => array(
            'method' => $method,
            'header' => "Authorization: Bearer " . 
            $_SESSION['access_token'] . "\r\n" . 
            "x-li-format: json\r\n"
        )
    );
    $url = 'https://api.linkedin.com' . $resource;
    if (count($params)) {
        $url .= '?' . http_build_query($params);
    }
    $context = stream_context_create($opts);
    $response = file_get_contents($url, false, $context);
    return json_decode($response);
}

}

/* End of file Linked.php */
/* Location: ./application/libraries/linkedin.php */

?>