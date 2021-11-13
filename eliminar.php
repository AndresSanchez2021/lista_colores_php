<?php
include_once 'conexion.php';

$id = $_GET['id'];

$sql_delete='DELETE FROM colores WHERE id=?';
$sentencia_delete = $pdo->prepare($sql_delete);
$sentencia_delete->execute(array($id));
header('location:index.php');