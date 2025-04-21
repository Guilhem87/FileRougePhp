<?php
include './utils/function.php';
include './utils/Bdd.php';
session_start();





session_destroy(); // detruit la session et donc l'authentification



header('Location:controller_accueilFR.php'); // redirection vers accueil apres s'etre déconnecter
exit;





?>