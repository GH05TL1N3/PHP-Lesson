<?Php
session_start("Admin");
if (($config["admin"]["user"] != $config["admin"]["user"]) or ($_SESSION["pass"] != $config["admin"]["pass"])) exit("<script>window.location = \"login.php?logout\";</script>");
?>