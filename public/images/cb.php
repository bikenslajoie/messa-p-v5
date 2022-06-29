<?php
require_once('../assets/mytools/codebarre/cbC128.php');
$code = new codeBarreC128($_GET['code']);
$code->setTitle();
$code->setFramedTitle(true);
$code->setHeight(70);
$code->Output();
?>