<?php 
require_once "./inc/functions/data.php";
$raw = getRawLink($_GET['r']);
var_dump($raw);
echo "<meta http-equiv='refresh' content='0;".$raw."'/>";
exit();