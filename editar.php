<?php
    include_once 'conexion.php';
    
    $id=$_GET['id'];
    $color=$_GET['color'];
    $descripcion=$_GET['descripcion'];
    echo $id;
    echo $color;
    echo $descripcion;
    
    
    $sql_editar = 'UPDATE colores SET color=?, descripcion=? WHERE id=?';
    $sentencia_aditar = $pdo->prepare($sql_editar);
    $sentencia_aditar->execute(array($color,$descripcion,$id));
    header('location:index.php');

