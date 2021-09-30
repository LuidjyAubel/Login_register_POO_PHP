<?php
session_start();
    if (isset($_SESSION['connecter']) && ($_SESSION['connecter'] == TRUE)){
        include 'Usermanager.php';
          include 'conf.php';
          $db = new PDO($host, $Usernam, $PassWD);
          $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $afficher = new Usermanager($db);
          $afficher->afficher();
          session_destroy();
    }else{
        error_reporting(0);
        print("vous n'etes pas connecter !");
        session_destroy();
    }
          

?>