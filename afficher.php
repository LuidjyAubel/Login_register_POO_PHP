<!DOCTYPE html>
<html lang="fr">
<head>
<title>afficher</title>
<meta charset="UTF-8" />
<meta name="author" content="Luidjy Aubel" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<?php
print("<a class='azerty btn btn-primary' href='deco.php'>Se déconnecter</a><br><hr>");
session_start();
    if (isset($_SESSION['connecter']) && ($_SESSION['connecter'] == TRUE)){
        include 'Usermanager.php';
          include 'conf.php';
          $db = new PDO($host, $Usernam, $PassWD);
          $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $afficher = new Usermanager($db);
          $afficher->afficher();
          //session_destroy();
    }else{
       // error_reporting(0);
        print("vous n'etes pas connecter !");
        session_destroy();
    }
          

?>