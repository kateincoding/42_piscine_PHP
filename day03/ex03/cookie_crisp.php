<?php
if ($_GET["action"] == "set")
    setcookie($_GET["name"], $_GET["value"], time() + 3600);
else if ($_GET["action"] == "get" && $_COOKIE[$_GET["name"]] != NULL)
    echo $_COOKIE[$_GET["name"]];
else if ($_GET["action"] == "del")
    setcookie($_GET["name"], NULL, -1);
?>