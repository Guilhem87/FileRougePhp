    <?php

class View3d {
    //attributs
    private ?string $message;

    public function __construct() {
    $this->message = "";
}
//getter setter
public function getMessage() {
    return $this->message;
}
public function setMessage(?string $newMessage): View3d {
    $this->message = $newMessage;
    return $this;
}

//methode

public function render(): string {
    ob_start();

    ?>
    
    <link rel="stylesheet" href="./src/style/style_3d.css"> 
    <div class="bandeau-defilant" role="alert">
    <div>
        <p>Attention, nous rappelons que ce site n'a pas vocation à se substituer à une consultation médicale!! 
        Pour tout diagnostic, prenez rendez-vous avec votre médecin traitant.</p>
        <p>Attention, nous rappelons que ce site n'a pas vocation à se substituer à une consultation médicale!! 
        Pour tout diagnostic, prenez rendez-vous avec votre médecin traitant.</p>
    </div>
    </div>
    <div class="contenu3d">
        <h2><strong>Localise ta douleur:</strong></h2>
        <p>Utilise la souris pour faire pivoter le mannequin</p>
        <div id="img3d"></div>
        <br><br>
        <!-- Liste des blessures disponibles -->
        <div class="blessures-container">
            <h2><span class="span2">B</span>lessures <span class="span2">D</span>isponibles</h2>
            
            <div class="blessures-grid">
                <!-- Haut du corps -->
                <div class="blessures-section">
                    <h3>Haut du corps</h3>
                    <div class="blessures-cards">
                        <a href="./controller_blessure.php?id_zone_blessure=1" class="blessure-card">
                            <span>Épaule</span>
                        </a>
                        <a href="./controller_blessure.php?id_zone_blessure=3" class="blessure-card">
                            <span>Coude</span>
                        </a>
                        <a href="./controller_blessure.php?id_zone_blessure=" class="blessure-card">
                            <span>Nuque</span>
                        </a>
                        <a href="./controller_blessure.php?id_zone_blessure=" class="blessure-card">
                            <span>Insertion biceps</span>
                        </a>
                        <a href="./controller_blessure.php?id_zone_blessure=" class="blessure-card">
                            <span>Les Trapèzes</span>
                        </a>
                    </div>
                </div>
                
                <!-- Tronc -->
                <div class="blessures-section">
                    <h3>Tronc</h3>
                    <div class="blessures-cards">
                        <a href="./controller_blessure.php?id_zone_blessure=2" class="blessure-card">
                            <span>Bas du Dos</span>
                        </a>
                    </div>
                </div>

                <!-- Bas du corps -->
                <div class="blessures-section">
                    <h3>Bas du corps</h3>
                    <div class="blessures-cards">
                        <a href="./controller_blessure.php?id_zone_blessure=4" class="blessure-card">
                            <span>Quadriceps</span>
                        </a>
                        <a href="./controller_pages.php" class="blessure-card">
                            <span>Genoux</span>
                        </a>
                        <a href="./controller_blessure.php?id_zone_blessure=5" class="blessure-card">
                            <span>Molet</span>
                        </a>
                        <a href="./achile.html" class="blessure-card">
                            <span>Tendon d'Achille</span>
                        </a>
                        <a href="./controller_blessure.php?id_zone_blessure=" class="blessure-card">
                            <span>Pied</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- importmap -->
    <script type="importmap">
    {
        "imports": {
        "three": "https://cdn.jsdelivr.net/npm/three@0.168.0/build/three.module.js",
        "three/addons/": "https://cdn.jsdelivr.net/npm/three@0.168.0/examples/jsm/"
        }
    }
    </script>
    </script>
    <script type="module" src="./src/script/3d.js"></script>
    

    <?php

    return ob_get_clean();
}

}
