<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     if ( ! function_exists('encode_id($data)'))
     {
       function encode_id($data)
       {
          $key = "my secret magic bytes";
          $base64_safe = true;
          $minlen = 11;
		   	$data = base_convert($data, 10, 36);
		    $data = str_pad($data, $minlen, '0', STR_PAD_LEFT);
		    $data = @mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $data, MCRYPT_MODE_CBC);
		    if ($base64_safe) $data = str_replace(array('+','/','='),array('-','_',''), base64_encode($data));
		    return $data;
       }
     }
     ?>