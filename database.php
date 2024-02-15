<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Base de donnée mysql</h1>

<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    try{
       $base = new PDO("mysql:host=$servername", $username, $password);
       $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE chronometre";
    $base->exec($ql);
    echo 'Base de données bien crée !';
    }catch(PDOException $e){
    echo "Erreur: ".$e->getMessage();
}

?>
</body>
</html>