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
    public function delete($id){
        $requete = $this->_db->query('SELECT id, EMAIL FROM usern');
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
            if ($id == $ligne['id']){
                $stmt = $this->_db->prepare('DELETE FROM usern WHERE id = ?;');
                $stmt->bindParam(1,$_GET['id']);
                $stmt->execute();
            }
    }
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
    public function afficher(){
        $tabperso = array();
        $requete = $this->_db->query('SELECT id, EMAIL FROM usern');
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
            print($ligne['id']." <br>");
            print($ligne['EMAIL']."<br>");
            print("<a class='btn btn-primary' href='update.php?id=".$ligne['id']."'>modifier</a><br>");
            print("<a class='btn btn-primary' href='delete.php?id=".$ligne['id']."'>supprimer</a><br><hr>");
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
        function update($id) {
            $requete = $this->_db->query('SELECT id, EMAIL, `PASSWORD` FROM usern;');
            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                if ($id == $ligne['id']){
                    print("<form method='POST'>");
                    print("<label for='modifie'>Id : </label>");
                    print("<input type='text' name='modifie' value=".$ligne['id']."><br><br>");
                    print("<label for='modif'>EMAIL : </label>");
                    print("<input type='text' name='modif' value=".$ligne['EMAIL']."><br><br>");
                    print("<input type='submit' value='Valider'>");
                    print("</form>");
                    $stmt = $this->_db->prepare('UPDATE usern SET EMAIL = ? WHERE id = ?;');
                    $stmt->bindParam(2, $_POST['modifie']);
                    $stmt->bindParam(1,$_POST['modif']);
                    $stmt->execute();
                }
                   }
                   
                }
        }
    
?>