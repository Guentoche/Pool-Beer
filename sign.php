<html>
    <head>
        <title> Pool & Beer - Inscription </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="sign.css">
        <link rel="shortout icon" href="WP/d1.png">
    </head>
    <body>

        <div class="login-box">

            <h1>INSCRIPTION</h1>

            <form action="" method="POST">

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" name ="nom" placeholder="Nom" />
                </div>
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" name ="prenom" placeholder="Prenom" />
                </div>
                <div class="textbox">
                    <i class="fa fa-envelope" aria-hidden="false"></i>
                    <input type="text" name ="email" placeholder="Email" />
                </div>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="text" name="motdepasse" placeholder="Mot de passe" />
                </div>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="text" name="cmotdepasse" placeholder="Confirmer mot de passe"/>
                </div>
                <input class="btn" type="submit" name="send" value ="Envoyer"  />

                <p>Vous êtes déjà inscrit ?
                    <a href="log.php">S'inscrire</a>
                </p>

            </form>
            <?php

                include "connect.php";
                $link=connect();

                session_start();

                if (isset($_SESSION['data'])) {
                   $_SESSION['data'] = [];
                }

                if ( check($_POST) ) {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                       $email = $_POST['email'];
                    }
                    if($_POST['motdepasse']===$_POST['cmotdepasse']){
                        $mdp = password_hash($_POST['motdepasse'],PASSWORD_BCRYPT);                         
                   }

                    $sql = "INSERT INTO liste2 ( nom, prenom, email, motdepasse) VALUES ( '$nom', '$prenom', '$email', '$mdp')";

                    $stmt = $link->prepare($sql);
                    $stmt->execute();
                }
                die();

            ?>
        </div>
    </body>
</html>
<?php
function check($post)
{
    if (isset($post['send'])) {
        if (!empty($post['nom']) && !empty($post['prenom']) && !empty($post['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($post['motdepasse']) && !empty($post['cmotdepasse'])) {
            return true;
        }
        return false;
    }
    return false;
}
?>