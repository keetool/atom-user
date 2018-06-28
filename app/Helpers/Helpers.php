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

function createDateRangeArray($iDateFrom, $iDateTo)
{
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange = array();


    if ($iDateTo >= $iDateFrom) {
        array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
        while ($iDateFrom < $iDateTo) {
            $iDateFrom += 86400; // add 24 hours
            array_push($aryRange, date('Y-m-d', $iDateFrom));
        }
    }
    return $aryRange;
}