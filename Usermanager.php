<?php
include 'conf.php';
Class Usermanager{
    private $_db;
    public function __construct(PDO $db){
        $this->setDb($db);
    }
    public function setDb($db){
        $this->_db = $db;
    }
    public function getId(){

    }
    public function addDb($user, $pass){
        //$db = new PDO($host, $Usernam, $PassWD);
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $this->_db->prepare('INSERT INTO usern (EMAIL, `PASSWORD`) VALUES (?, ?);');
        $stmt->bindParam(1, $user);
        $stmt->bindParam(2, $pass);
        $stmt->execute();
        //$stmt->destruct();
    }
    public function afficher()
    {
        $tabperso = array();
        $requete = $this->_db->query('SELECT id, EMAIL FROM usern');
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
            print($ligne['id']." <br>");
            print($ligne['EMAIL']."<br><hr>");
        }
        }
    public function connect($MAiL, $pass2){
        session_start();
        $_SESSION["connecter"] = FALSE;
 $requete = $this->_db->query('SELECT id, EMAIL, `PASSWORD` FROM usern');
 while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
     if ($MAiL == $ligne['EMAIL']){
         $hash = $ligne['PASSWORD'];
        if (password_verify($pass2, $hash)) {
            echo 'Le mot de passe est valide !';
            $_SESSION['connecter'] = TRUE;
            header('Location: afficher.php');
        } else {
            session_destroy();
            echo 'Le mot de passe est invalide.';
        }
        }
    }
        }

    }
?>