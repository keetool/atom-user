<?php
/**
 * Remove protocol from url
 * @param [string] url
 * @return [string] hostname
 */
function remove_protocol($url) {
    return preg_replace("(^https?://)", "", $url );
}

function generate_https($url) {
    $url = trim($url);
    
    if(substr($url, 0, 8) == "https://" || substr($url, 0, 7) == "http://"){
        return $url;
    }else{
        return "https://".$url;
    }
}