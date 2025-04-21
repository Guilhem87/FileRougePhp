<?php

// Inclusion des fichiers nécessaires
include './utils/Bdd.php';
include './controller.php';  // Contrôleur de base
include './model/User.php';  // Modèle User
include './manager/manager_user.php';  // Gestionnaire des utilisateurs
include './view/view_accueil.php';  // Vue d'accueil



class ControllerAccueil extends Controller {
    private ?ManagerUser $userManager;
    private ?ViewAccueil $accueil;


    public function __construct() {
        $this->userManager = new ManagerUser(connect());
        $this->accueil = new ViewAccueil();
        $this->setHeader(new ViewHeader(""));
        $this->setFooter(new ViewFooter());
    }

    public function displayUsers(): void {
        $data = $this->userManager->readUsers();  // Lecture des utilisateurs
        ob_start();
        foreach ($data as $user) {
            echo $this->accueil->cardUser($user);
        }
        $this->accueil->setListUsers(ob_get_clean());
    }

    public function renderViews(): void {

        // Affichage des utilisateurs
        // $this->displayUsers();

        $this->getFooter()->setMessage($this->getHeader()->getMessage());
        $this->getHeader()->setMessage($this->getHeader()->getMessage());
        
        
        echo $this->renderHeader();
        echo $this->accueil->render();
        echo $this->getFooter()->render();
    }
}


// Création du controller
$accueil = new ControllerAccueil();
// Lancement du rendu
$accueil->renderViews();


?>