
    <?php

class ViewPages {
    // private ?Pages $pages;
    private ?string $titre;
    private ?array $texte;
    private ?string $sousTitre;

    public function __construct() {//?Pages $pages
        $this->titre = '';
        // $this->texte = '';
        $this->sousTitre = '';
        // $this->pages = $pages;
    }

    // public function setPage(?Pages $pages): ViewPages {
    //     $this->pages = $pages;
    //     return $this;
    // }
    // public function getPages(): Pages {
    //     return $this->pages;
    // }

    public function setTexte(?array $texte): void {
        $this->texte = $texte;
    }
    public function geTexte(): ?array {
        return $this->texte;
    }


    public function getsousTitre(): ?string {
        return $this->sousTitre;
    }
    public function setsousTitre(?string $sousTitre): ViewPages {
        $this->sousTitre = $sousTitre;
        return $this;
    }


    public function getTitre(){
        return $this->titre;
    }
    public function setTitre(?string $newTitre): ViewPages {
        $this->titre = $newTitre;
        return $this;
    }

//METHODES
    public function render():void{
        ob_start();
        
    ?>
    <link rel="stylesheet" href="./src/style/style_pages.css">
    <link rel="stylesheet" href="./src/style/style_3d.css">
    <link rel="stylesheet" href="./src/style/style_global.css">
    
    
    <div class="bandeau-defilant">
        <div>
            <p>Attention, nous rappelons que ce site n'a pas vocation à se substituer à une consultation médicale!! 
            Pour tout diagnostic, prenez rendez-vous avec votre médecin traitant.</p>
            <p>Attention, nous rappelons que ce site n'a pas vocation à se substituer à une consultation médicale!! 
            Pour tout diagnostic, prenez rendez-vous avec votre médecin traitant.</p>
        </div>
    </div>
    <main id="main_corps">
        <h2><strong>LE GENOU</strong></h2>
        <div id="apropos"></div>
        <!--<h3>Avant-propos.</h3>
        <p><strong>Il est important de tout d'abord savoir qu'au niveau médical il existe une analyse des blessures et des choques traumatiques qui indiquent les besoins d'une intervention immédiate</strong>. </br>  
        Certains éléments doivent immédiatement attirer ton attention car ils signalent potentiellement une situation grave, nécessitant une prise en charge rapide. Voici quelques exemples :
            <ul>
                <li><strong>Perte de conscience</strong> (même brève) : Signe d’un traumatisme crânien potentiellement grave.</li>
                <li><strong>Difficultés respiratoires</strong> : Cela peut être signe de traumatisme thoracique ou de choc.</li>
                <li><strong>Fracture visible ou déformation</strong> : Cela peut nécessiter une immobilisation rapide et une prise en charge chirurgicale.</li>
                <li><strong>Hémorragie sévère</strong> : Un saignement abondant doit être traité rapidement pour éviter un choc hémorragique.</li>
                <li><strong>Douleur intense et résistante aux mouvements</strong> : Indique potentiellement une fracture ou un autre dommage interne significatif.</li>
            </ul>
        </p>-->
        <div class="contenuTxt">
            <p><strong>Le genou est encerclé de tendons qui participent à sa protection. Voici des explications sur les différentes tendinites du genou, des conseils efficaces pour les prévenir et les soigner, ainsi que des détails sur le rôle de l’ostéopathie dans leurs traitements.</strong></p>
            <h3>1.Tendinite rotulienne (Genou du sauteur)</h3>
            
            <p><strong>Gravité : Légère à modérée</strong></p> <br>
            <div class="div_corps1">
                <p>La tendinopathie patellaire, ou tendinopathie rotulienne, également connue sous le nom de genou du sauteur ou incorrectement appelé tendinite patellaire ou rotulienne, est une blessure par surutilisation du tendon rotulien, qui se charge de l'extension du genou. <br><br>
                En règle générale, une douleur et de la sensibilité se présentent dans la partie inférieure de la rotule, bien que la partie supérieure puisse également être affectée. La douleur est généralement absente au repos et est déclenchée par l'effort. Des complications peuvent inclure, dans les cas sévères, une rupture du tendon rotulien. <br><br>
                Les facteurs de risque comprennent le surpoids et la pratique de sports de saut tels que le basket-ball et le volleyball. Jusqu'à 14% des athlètes peuvent en être atteints. Le mécanisme sous-jacent implique des micro-déchirures dans le tendon reliant la rotule au tibia. <br><br> Le diagnostic repose généralement sur l'examen clinique, l'échographie pouvant aider à confirmer le diagnostic.
                </p>
                <img class="genou1" src="./src/img/shema_tendon_rotulien.jpg" alt="tendinite_rotulienne">
            </div> <br><br>
            <p><strong>Symptômes principaux :</strong></p> <br>
            <div>
                <img class="genou1" src="./src/img/tendinite_ rotu.jpg" alt="image_douleur_genou">
                <p>
                Douleur juste sous la rotule (au niveau du tendon rotulien) qui s’aggrave lors des mouvements comme sauter, courir, ou faire des squats. <br>
                Douleur plus marquée lorsque vous essayez de fléchir ou d’étendre le genou, surtout après un effort prolongé. <br>
                Sensibilité lorsque vous touchez ou appuyez juste en dessous de la <br>rotule.
                </p>
            </div><br><br>
            <h5>Tests diagnostiques (simplifiés) :</h5>
            Test de résistance à l’extension : On vous demande d’essayer de redresser votre jambe contre une légère résistance. Si cela fait mal juste sous la rotule, il y a de grandes chances que ce soit une tendinite rotulienne.
            Palpation : Le médecin appuie doucement sur la zone juste en dessous de la rotule. Si cela vous fait mal, c'est un signe d’inflammation du tendon rotulien.

            <h3>2. Tendinite quadricipitale</h3>
            Gravité : Légère à modérée
            Symptômes principaux :

            Douleur juste au-dessus de la rotule, là où le tendon du quadriceps (le gros muscle de la cuisse) s’attache à la rotule.
            Douleur qui devient plus forte lors de mouvements comme les squats ou quand vous montez les escaliers.
            Sensibilité au toucher au-dessus de la rotule.

            <h5>Tests diagnostiques (simplifiés) :</h5>

            Test de flexion du genou : On vous demande de plier votre genou. Si la douleur augmente lorsque le genou est fléchi, cela suggère une tendinite du quadriceps.
            Test de contraction : On vous demande de contracter les muscles de votre cuisse (quadriceps) tout en essayant de tendre votre jambe. Si cela provoque une douleur au-dessus de la rotule, cela indique probablement une tendinite du quadriceps.


            <h3>3. Lésion du ménisque</h3>
                Gravité : Modérée
                Symptômes principaux :


            Douleur localisée à l'intérieur ou à l'extérieur du genou, souvent après un mouvement de torsion du genou.
            Sensation de "blocage" du genou, où il semble se coincer ou ne pas pouvoir bouger complètement.
            Gonflement du genou qui apparaît quelques heures après une activité.
            Difficulté à tendre complètement le genou, surtout après une activité sportive.

            <h5>Tests diagnostiques (simplifiés) :</h5>

            Test de McMurray : Le médecin plie votre genou et tourne doucement votre jambe tout en écoutant les bruits (craquement) et en surveillant les douleurs. Une douleur ou un craquement peut signifier une lésion du ménisque.
            Test de Thessaly : Vous vous tenez debout sur une jambe, pliez légèrement le genou et tournez votre corps. Si cela cause une douleur à l'intérieur ou à l'extérieur du genou, c'est souvent un signe de déchirure du ménisque.

            <h3>4. Lésion du ligament croisé antérieur (LCA)</h3>
            Gravité : Sévère
            Symptômes principaux :

            Craquement audible ou sensation que quelque chose a "sauté" dans votre genou au moment de la blessure, souvent suite à un mouvement brusque comme un pivot ou une mauvaise réception après un saut.
            Gonflement rapide du genou juste après la blessure, souvent dans les premières heures.
            Sensation que le genou est instable, qu’il "lâche" ou que vous n’êtes plus capable de soutenir votre poids dessus.
            Douleur intense initiale qui peut s’atténuer avec le temps, mais l’instabilité persiste.

            <h5>Tests diagnostiques (simplifiés) :</h5>

            Test de Lachman : Le médecin tient votre cuisse et votre tibia et tente de tirer doucement le tibia vers l’avant. Si le tibia bouge plus qu’il ne le devrait ou si vous ressentez une douleur, cela peut indiquer une rupture du LCA.
            Test du tiroir antérieur : Vous êtes allongé avec le genou fléchi à 90°. Le médecin tire doucement sur le tibia. Si le tibia glisse vers l'avant plus que la normale, cela peut confirmer une lésion du LCA.
            Pivot Shift Test : En tournant doucement votre tibia tout en exerçant une pression sur le genou, si le genou semble "sauter" ou "décrocher", c'est souvent un signe de rupture du LCA.

            <p>En résumé, les tendinites sont souvent des blessures de surcharge dues à des mouvements répétitifs, tandis que les lésions du ménisque et du LCA sont des blessures plus graves, généralement causées par des torsions ou des mouvements brusques du genou. Ces blessures nécessitent des tests spécifiques pour bien évaluer leur gravité et adapter le traitement.</p>
    </div>
        </main>
        <script src="./src/script/intro_parties_corps.js"></script>




    <?php 
        ob_end_flush();
    }
}