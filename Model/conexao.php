<?php

//$pdo = new PDO("mysql:dbname=sgc;host=localhost","root",""); 
$host = "localhost";
$user = "root";
$bd = "sgc";
$senha = "";

$con = mysqli_connect($host, $user, $senha, $bd) or die ("Não foi possivel conectar ao banco");

?>