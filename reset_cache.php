<?php
header('Content-Type: text/plain; charset=UTF-8');

$res = array();
if (function_exists('opcache_reset')) {
    $r = @opcache_reset();
    $res[] = "opcache_reset: " . ($r ? "SUCCESS" : "FAILED");
} else {
    $res[] = "opcache_reset: NOT_EXISTS";
}

// Touch .lsphp_restart.txt if possible
$docroot = dirname(dirname(dirname(__DIR__)));
$restart_file = $docroot . '/.lsphp_restart.txt';
if (@file_put_contents($restart_file, time())) {
    $res[] = "touch .lsphp_restart.txt in docroot: SUCCESS";
} else {
    $res[] = "touch .lsphp_restart.txt: " . $restart_file . " FAILED";
}

echo implode("\n", $res);
