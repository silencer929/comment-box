<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . DS . "comment-box/");
define("INCLUDES", ROOT . "includes" .DS);
define("MYSQL_DIR", ROOT . "mysql" . DS);
define("MODEL", ROOT . "mysql" . DS . "model" . DS);
require_once MYSQL_DIR ."database.php";
?>