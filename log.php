<?php
    include "connect.php";
    $link=connect();
    session_start();
	if (isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }	

    if(check($_POST)){
        $mail = $_POST['email'];
        $mdp = $_POST['mdp'];
        $req = "SELECT * FROM 'liste2' WHERE email='$mail' and motdepasse='$mdp'";
        $res = mysql_query($req) or die(mysql_error());
        $donnee = mysql_fetch_array($res);
        if(mysql_num_rows($res)==1){
            header('location:index.php');
        }
    else{
    	    $message = "Le mail ou le mot de passe est incorrect";
        }
	}    
?>
<html>
    <head>
        <title> Pool & Beer - Connexion </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="log.css">
        <link rel="shortout icon" href="WP/d2.png">
    </head>
    <body>
        <form>
            <div class="login-box">
                <h1>CONNEXION</h1>
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="E-Mail" name="email">
                </div>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Mot de passe" name="mdp">
                </div>
                <input class="btn" type="button" name="" value="Se connecter">
                <p>Vous n'êtes pas inscrit ?
                    <a href="add.php">S'inscrire</a>
                </p>
                <?php if (! empty($message)) { ?>
                    <p class="error_message"><?php echo $message;?></p>
                <?php } ?>
            </div>
        </form>
    </body>
</html>