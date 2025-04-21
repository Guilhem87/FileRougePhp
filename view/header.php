<?php

class ViewHeader {
    private ?string $nav;
    private ?string $message;

    public function __construct(?string $nav) {
        $this->nav = $nav;
        $this->message = "";
    }
//GETTER SETTER
    public function getMessage() {
        return $this->message;
    }

    public function setMessage(?string $newMessage): ViewHeader {
        $this->message = $newMessage;
        return $this;
    }

    public function getNav() {
        return $this->nav;
    }

    public function setNav(?string $newNav): ViewHeader {
        $this->nav = $newNav;
        return $this;
    }
// methodes
    public function render(): string {
        ob_start();
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportInjury</title>
    <link rel="stylesheet" href="./src/style/style_global.css">
    <link rel="stylesheet" href="./src/style/style_accueil.css">
    <link rel="stylesheet" href="./src/style/style_inscription.css">
    <link rel="stylesheet" href="./src/style/style_mobile_responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    /* Effet de survol simple pour les liens de navigation */
    #navbarSupportedContent .navbar-nav .nav-link:hover {
        color: #ffc107 !important; 
        text-decoration: underline !important;
        transition: color 0.2s ease;
    }
    
    /* Style spécial pour le lien déjà en jaune */
    #navbarSupportedContent .nav-link.text-warning:hover {
        color: white !important;
    }
    #img3d {
        width: 100%;
        padding: 0;
        overflow: hidden;
    }
    
    #img3d canvas {
        width: 100% !important;
        display: block;
    }
    
    /* Animation clignotante pour le lien "OU EST TA DOULEUR ?" */
    @keyframes blink-text {
        0% { opacity: 1; text-shadow: 0 0 3px rgba(255, 193, 7, 0.5); }
        50% { opacity: 0.7; text-shadow: 0 0 10px rgba(255, 193, 7, 0.8); }
        100% { opacity: 1; text-shadow: 0 0 3px rgba(255, 193, 7, 0.5); }
    }
    
    .blink-link {
        animation: blink-text 1.5s ease-in-out infinite;
        font-weight: bold !important;
    }
    
    /* Style pour le bouton rendez-vous */
    .btn-rdv {
        background-color: #2c3e50;
        color: white !important;
        border-radius: 5px;
        padding: 8px 12px !important;
        margin-left: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 100, 0.2);
        transition: all 0.3s ease;
    }
    
    .btn-rdv:hover {
        background-color: #1a252f;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 100, 0.3);
    }
    
    .btn-rdv i {
        margin-right: 5px;
    }
</style>

</head>
<body>
    <header id="header" class="headcontent">
        <div id="logo">
                <a href="./controlLer_accueilFR.php"><img src="./src/img/logo.png" alt="logo"></a>
        </div>
        <div class="container">
            <div class="shape1">
                <div class="deco1"></div>
            </div>
        </div>
        <div class="t1">
                <h1><strong><span>S</span>port <span>I</span>njury</strong></h1>
        </div>
        <div class="container">
            <div class="shape2">
                <div class="deco2"></div>
            </div>
        </div>
        <div class="seco">
        <a href="controller_accueilFR.php">Accueil</a><br>
        <?php echo $this->getNav(); ?>    
        </div>
    </header>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
        <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Navigation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="./controller_accueilFR.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning blink-link" href="./controller_3d.php">OU EST TA DOULEUR ?</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Corps
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="./achile.html">Tendon d'Achille</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=1">Épaule</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=2">Bas du Dos</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=3">Coude</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=5">Molet</a></li>
                            <li><a class="dropdown-item" href="./controller_pages.php">Genoux</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=">Pied</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=">Nuque</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=4">Quadriceps</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure="> Insertion biceps</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=">Les Trapèzes</a></li>
                            <li><a class="dropdown-item" href="./controller_blessure.php?id_zone_blessure=">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./controller_page_inscription.php">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-rdv" href="https://www.doctolib.fr/" target="_blank">
                            <i class="bi bi-calendar-check"></i>Rendez-vous avec Docto
                        </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Rechercher. . ." aria-label="Search">
                    <button class="btn btn-outline-success text-light" type="submit">lancer</button>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Ajout de Bootstrap Icons pour l'icône du calendrier -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    </nav>

            
        <!-- </header> -->
        
        <?php
        return ob_get_clean();
    }
}