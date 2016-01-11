<?Php
error_reporting(E_ALL ^ E_NOTICE); // Set error show
date_default_timezone_set("Asia/Bangkok"); // Set TimeZone

// Config
$config = array(
	"sql" => array(
		"host" => "localhost",
		"user" => "root",
		"pass" => "root",
		"db" => "admin_clicknaka",
	),
	"admin" => array(
		"user" => "root",
		"pass" => "root",
	),
);


?>