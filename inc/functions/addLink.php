<?php
require_once "./data.php";
createNewLink($_POST["link"]);
echo "<meta http-equiv='refresh' content='0;../../dashboard/index.php'/>";
exit();