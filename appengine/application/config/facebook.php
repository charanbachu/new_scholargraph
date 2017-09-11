<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Facebook App details
| -------------------------------------------------------------------
|
| To get an facebook app details you have to be a registered developer
| at http://developer.facebook.com and create an app for your project.
|
|  facebook_app_id               string  Your facebook app ID.
|  facebook_app_secret           string  Your facebook app secret.
|  facebook_login_type           string  Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string  URL tor redirect back to after login. Do not include domain.
|  facebook_logout_redirect_url  string  URL tor redirect back to after login. Do not include domain.
|  facebook_permissions          array   The permissions you need.
*/

$config['facebook_app_id']              = '271286589920597';
$config['facebook_app_secret']          = '564e7f277134ce693c75905adafe215a';

//$config['facebook_app_id']              = '408156819345017';
//$config['facebook_app_secret']          = '353304b6c0d34cc0d855640b5fefec62';


$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'welcome/web_login';
$config['facebook_logout_redirect_url'] = 'welcome/logout';
$config['facebook_permissions']         = array('public_profile', 'user_education_history', 'email');
$config['facebook_graph_version']       = 'v2.6';
$config['facebook_auth_on_load']        = TRUE;
