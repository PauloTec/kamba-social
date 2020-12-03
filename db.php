<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	$connect = mysqli_connect("127.0.0.1", "root", "") or die ("Não foi possivel conectar a base de dados!!");
	$db = mysqli_select_db($connect,"rede_social_kundiama_db") or die ("Impossivel entrar na BD");
?>
