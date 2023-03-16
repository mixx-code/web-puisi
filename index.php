<?php
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'http://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: ' . $uri . '/web-puisi/src/pages/main_layout/?page=home');
exit;
