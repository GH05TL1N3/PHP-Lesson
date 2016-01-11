<?Php
$login_uid = $_COOKIE["uid"];
$login_md5_pass = md5($_COOKIE["pass"]);
try{
	$stmt = $dbHandle->prepare("SELECT COUNT(`id`) AS `Count` FROM `vipuser` WHERE `id` = ? and `pass` = ?;");
	$stmt->execute(array($login_uid, $login_md5_pass));
	$arr = $stmt->fetch();
}catch(PDOException $e){
	var_dump($e);
	exit();
}
$login = ($arr["Count"] != 0 ? true : false);
?>