<?php
$servidor = "sql103.infinityfree.com";
$usuario  = "if0_40466863";
$password = "mila060801";
$base_datos = "if0_40466863_perfil_db";

$conn = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>