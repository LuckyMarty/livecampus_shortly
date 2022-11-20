<?php
require_once "./data.php";
updateUser($_POST);
echo "<meta http-equiv='refresh' content='0;../../dashboard/index.php'/>";
exit();