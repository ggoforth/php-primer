<?php namespace geekwise;

/**
 * @param string $msg The string to be logged
 */
function logger($msg = '') {
    echo "\n*********************\n";
    if (is_string($msg)) {
        echo sprintf('%s', $msg);
    } else if (is_array($msg) || is_object($msg)) {
        var_dump($msg);
    }
    echo "\n*********************\n";
}
