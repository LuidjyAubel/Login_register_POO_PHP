<?php
include 'Usermanager.php';
include 'conf.php';

$id = $_GET['id'];
$db = new PDO($host, $Usernam, $PassWD);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$afficher = new Usermanager($db);
$afficher->update($id);
?>