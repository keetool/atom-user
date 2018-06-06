<?php
/**
 * Remove protocol from url
 * @param [string] url
 * @return [string] hostname
 */
function remove_protocol($url) {
    return preg_replace("(^https?://)", "", $url );
}
