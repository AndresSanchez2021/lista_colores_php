<?php
$link = "mysql:host=localhost;dbname=yt_colores";
$usuario =  'root';
$pasword="";

try {
    $pdo = new PDO($link, $usuario, $pasword);
    /* foreach($pdo->query('SELECT * from colores') as $fila) {
        print_r($fila);
    } */
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>