<?php
require_once "./data.php";
destroyLink($_GET["id"]);
echo "<meta http-equiv='refresh' content='0;../../dashboard/index.php'/>";
exit();