<?php error_reporting(0);
if (stristr(php_sapi_name(), "fcgi")) {
    $url = "http://" . $_SERVER["HTTP_HOST"];
    header("Location: {$url}/404.html");
} else {
    header("HTTP/1.1 404 Not Found", true, 404);
}
exit(); ?>