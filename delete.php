<?php
include 'Usermanager.php';
include 'conf.php';
print('<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<link rel="stylesheet" href="style.css"></head>');
print("<h2>delete</h2>");
$id = $_GET['id'];
$db = new PDO($host, $Usernam, $PassWD);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$afficher = new Usermanager($db);
$afficher->delete($id);
print("L'utilisateur à étais supprimer avec succès !<br>");
print("<a class='btn btn-primary' href='afficher.php'>afficher les utilisateurs</a><br>");
?>