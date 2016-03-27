<?php
ini_set('error_log', '/tmp/php_error.log');
require_once('pass.php');
//  mail from tasker
$to = isset($_POST['to']) ? $_POST['to'] : $user['from'];
$from = $user['from'];
$sub = mb_encode_mimeheader ( $_POST['sub'], 'UTF-7', 'B');
$msg = $_POST['msg'];
//$msg = mb_convert_encoding( $_POST['msg'], 'ISO-2202-JP', 'UTF-8'); 

$auth = $_POST['auth'];

;
/*
if ( $auth !== $user['pass'] ) {
    header('Location: http://www.mousou.org');
    exit();
}
*/
$addi['from'] = sprintf("From: %s", $from);
$addi['bcc'] = sprintf('Bcc: %s', 'takemon@bamboogate.co.jp');

$additonal_headers = implode('\r\n', $addi);
$additional_parameters = '-ftakemon@mousou.org';
error_log( $msg );
$ret = mail ( $to , $sub , $msg, $additional_headers, $additional_parameters);

exit($ret);