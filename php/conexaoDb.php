<?php

$host = "127.0.0.1";
$bd = "plataformagestaofrotasveiculosexoticos";
$user = "root";
$pass = "";

$liga = mysqli_connect($host, $user, $pass, $bd);

if(!$liga){
    echo "<script>alert('Nao foi possivel aceder a BD');</script>";
}

?>