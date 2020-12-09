<?php
function connect(){
	try{
		return $link = new PDO('mysql:host=localhost:3306;dbname=test','root','');
	}
	catch(PDOException $e) {
		print "Erreur !: " . $e->getMessage()."<br>";die();
	}
}

?>
