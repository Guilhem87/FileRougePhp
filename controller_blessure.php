<?php

include './controller.php';
include './model/Blessure.php';
include './view/view_blessure.php';
include './manager/manager_blessure.php';
include './utils/Bdd.php';

class ControllerBlessure extends Controller {

    private ?ViewBlessure $viewBlessure;
    private ?ManagerBlessure $managerBlessure;

    public function __construct(){
        $this->viewBlessure = new ViewBlessure();
        $this->managerBlessure = new ManagerBlessure(connect());
        $this->setHeader(new ViewHeader(""));
        $this->setFooter(new ViewFooter());
    }

    public function getViewBlessure(): ViewBlessure {
        return $this->viewBlessure;
    }

    public function setViewBlessure(ViewBlessure $newViewBlessure): ControllerBlessure {
        $this->viewBlessure = $newViewBlessure;
        return $this;
    }

    public function fetchBlessures(): void {
        $blessures = $this->managerBlessure->getAllBlessures();
        $this->viewBlessure->setBlessures($blessures);
    }

    // Méthode pour afficher les blessures selon la zone
    // public function displayBlessure() : void {
    //     if (isset($_GET['id_zone_blessure'])) {
    //         $id_zone_blessure = intval($_GET['id_zone_blessure']);

    //         // Récupération des blessures de la zone spécifiée
    //         $blessures = $this->managerBlessure->readBlessuresByZone($id_zone_blessure);

    //         //  ViewBlessure pour afficher les données
    //         $this->viewBlessure->setBlessures($blessures);
    //     } else {
    //         echo "Aucune zone de blessure spécifiée.";
    //     }
    // }
    public function displayBlessure() : void {
        // Vérification d'une id dans l'URL'
        if (isset($_GET['id_zone_blessure'])) {
            
            // Nettoyage et validation du paramètre
            $raw_id = sanitizeGuigui($_GET['id_zone_blessure']);
            $id_zone_blessure = intval($raw_id);
            
            // Vérification que l'ID est un nombre positif valide
            if ($id_zone_blessure <= 0) {
                // Redirection ou message d'erreur
                echo "ID de zone invalide.";
                return;
            }
            // Vérification que l'ID existe dans la base de données
            // Option 1: Créer une nouvelle méthode dans le manager pour vérifier l'existence
            $zone_exists = $this->managerBlessure->checkZoneExists($id_zone_blessure);
            
            if (!$zone_exists) {
                echo "Cette zone n'existe pas.";
                return;
            }
            // Récupération des blessures de la zone spécifiée avec un paramètre sécurisé
            try {
                $blessures = $this->managerBlessure->readBlessuresByZone($id_zone_blessure);
                
                // ViewBlessure pour afficher les données
                $this->viewBlessure->setBlessures($blessures);
            } catch (Exception $e) {
                // Gérer l'erreur de manière sécurisée (sans exposer les détails)
                error_log("Erreur lors de la récupération des blessures: " . $e->getMessage());
                echo "Une erreur est survenue lors de la récupération des données.";
            }
        } else {
            // Redirection vers une page par défaut ou message d'erreur
            echo "Aucune zone de blessure spécifiée.";
        }
    }

    // affiche l'ensemble des views
    public function renderViews(): void {
        $this->displayBlessure(); // recup et affiche les blessures de la zone grace id url 
        echo $this->getHeader()->render();
        echo $this->viewBlessure->render(); //  affiche directement la vue de blessure
        echo $this->getFooter()->render();
    }
}

// Exécution du contrôleur
$controller = new ControllerBlessure();
$controller->renderViews();
