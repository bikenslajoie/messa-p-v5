<?php
require_once('../assets/mytools/phpqrcode/qrlib.php'); 
$id = "";
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
QRcode::png('https://my.messa.online/verifier/'.$id.'/personnel');
?>