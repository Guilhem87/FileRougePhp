<?php

// Charge les variables d'environnement
require_once __DIR__.'/env-loader.php';

/////////////////////////////////////
//Création des Fonctions Utilitaires
/////////////////////////////////////

/*sanitizeYoyo() : enlève les balises HTML, PHP, les espaces et les caractères d'échappement
* Param : $data -> string
* Return : string
*/
function sanitizeGuigui($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}



function connect() {
    static $bdd = null;

    if ($bdd === null) {
        try {
            $bdd = new PDO(
                "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD']
            );
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    return $bdd;
}

function seCo() {
    return isset($_SESSION['nom_utilisateur'],$_SESSION['prenom_utilisateur'], $_SESSION['id_utilisateur'], $_SESSION['email_utilisateur']) &&
    !empty($_SESSION['nom_utilisateur']) && $_SESSION['prenom_utilisateur'] && !empty($_SESSION['id_utilisateur']) && !empty($_SESSION['email_utilisateur']);
};

?>
