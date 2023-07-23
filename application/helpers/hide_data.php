<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('hidden_data')) 
    {
    function hide_data($data, $created_date, $expiration_days = 1) {
        $now = time();
        $created = strtotime($created_date);
        $expiration = $created + ($expiration_days * 24 * 60 * 60);
        if ($now > $expiration) {
            return "";
        }
        return $data;
    }
    
}