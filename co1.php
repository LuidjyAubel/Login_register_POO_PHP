<!DOCTYPE html>
<html lang="fr">
<title>Connexion</title>
<meta charset="UTF-8" />
<meta name="author" content="Luidjy Aubel" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<body>

    <h1>Connexion</h1>
    <main>
        <form method="POST">
            <div class="mb-3">
              <label for="Email" class="form-label">Email</label>
              <input type="text" class="form-control" name="Email" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="Pass" class="form-label">Password</label>
              <input type="password" class="form-control" name="Pass" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remenber me</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <?php
                    include 'Usermanager.php';
                    include 'conf.php';
             if (isset($_POST['Email'])&&(isset($_POST['Pass']))){
                $db = new PDO($host, $Usernam, $PassWD);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $newuser = new Usermanager($db);
                $pass2 = $_POST['Pass'];
                //$pass2 = password_hash($_POST['Pass'], PASSWORD_DEFAULT);
                $newuser->connect($_POST['Email'], $pass2);
             }
          /*print("Mail : ".$_POST["Email"]." <br/>");
          print("Password : ".$_POST["Pass"]." <br/>");*/

          ?>
    </main>
    <footer>
    </footer>
</body>

</html>