<?php
    
class ViewAccueil{
    private ?string $listUsers;

    public function __construct()
    {
        $this->listUsers = "";
    }


    public function getListUsers(){
        return $this->listUsers;
    }
    public function setListUsers(?string $newListUsers):ViewAccueil{
        $this->listUsers = $newListUsers;
        return $this;
    }

    public function cardUser($user):?string{
        ob_start();
?>
        <li><?php echo "{$user['pseudo_utilisateur']} : {$user['email_utilisateur']}"?></li>
<?php
        return ob_get_clean();
    }

    public function render():string{
        ob_start();
?>
        <main>
        <div class="a1">
            <h2><strong><span class="span2">S</span>ports <span class="span2">I</span>njury c'est quoi?</strong></h2>
            <div class="text1"><p>Bonjour, je suis le créateur du concept de SportInjury (SI). Je suis un pratiquant de sport assidu depuis des années et en particulier de VolleyBall (Nationale 2) et CrossFit. <br> Comme toutes personnes faisant du sport, ou commençant, je me suis fait ces dernières années une multitude de différentes blessures plus ou moins "graves". <br/> Cependant il est de plus en plus difficile d'obtenir des rendez-vous chez les médecins et encore plus chez les spécialistes. <br> J'ai donc eu l'idée, dans le cadre d'un projet, de crée un site qui permettrai d'aider les gens qui se posent des questions sur leurs "petits" problèmes physique et de les accompagner.</div> 
                <ul class="ul_intro">
                    <li><img src="./src/img/jaiquoi.png" alt="jaiquoi"><strong>Informer les utilisateurs</strong>  des problèmes les plus courants.</li>
                    <li><img src="./src/img/motiver.png" alt=""><strong>Les motiver</strong>  à se soigner et continuer le sport.</li>
                    <li><img src="./src/img/aider.png" alt=""><strong>Aider en accompagnant</strong> la reprise du sport.</li>
                    <li><img src="./src/img/temps.png" alt=""><strong> Gagner du temps</strong>  en orientant pour les prises de rendez-vous.</li>
                    <li><img src="./src/img/conseiller.png" alt=""><strong>Donner des conceils</strong> d'exercices de réeducation aux personnes déjà diagnostiquées.</li>
                    <li><img src="./src/img/rassurant.webp" alt=""><strong>Rassurer sur les douleurs</strong> que l'on peut ressentir.</li>
                    <li><img src="./src/img/pont2.png" alt=""><strong>Créer un pont</strong> avec la plate-forme Doctolib.</li>
                </ul>
            </p>
            <span class="span3"><p><strong>Tout simplement aider les gens à prendre soin d'eux</strong></p></span>
        </div>
        <div class="a2">
            <h2><strong>!! ATTENTION !!</strong></h2>
            <div>
                <img src="./src/img/image_attention1.png" alt="attention">
                <p><strong>Ce site d’aide à l'identification de blessure ne remplace pas un avis médical. <br/>
                Bien que ce site ait été conçu en collaboration avec des médecins, <br>
                il ne constitue en aucun cas une consultation personnalisée. <br/> 
                Les informations sont fournies à titre indicatif et ne doivent pas être <br>
                utilisées pour établir un diagnostic ou débuter un traitement sans l’avis<br/>
                d’un professionnel de santé. Pour toute question ou inquiétude concernant <br>
                votre santé, il est impératif de consulter votre médecin traitant.</strong></p>
                <img src="./src/img/attention_2.1.png" alt="attention2">
            </div>
        </div>
        <div class="a3">
            <p>Nous invitons nos utilisateurs à <a href="./inscription/inscription.html"><strong>se connecter</strong></a> via un compte <img src="./src/img/doctolib_logo.png" alt="doctolib_logo">, ce qui permettrait de faire la transition plus rapidement vers la plateforme de prise de rendez-vous.<br>Vous pouvez cependant créer un compte <strong>S.I</strong> qui vous  permettra d'enregistrer votre historique de consultation en sauvegardant les vidéos que vous avez aimé,</br> laisser des commentaires, envoyer des messages ou du contenu aux administrateurs.
            </p>
        </div>
        <div class="a4">
            <span class="ident_bless"><a href="./controller_3d.php">Identifier une blessure <img src="./src/img/muscle-disque.png" alt="mannequin musculaire disque"></a></span>
        </div>
        <p class="pend">Vous désirez <strong>nous CONTACTER ?</strong> Pensez à vous connecter ou créer un compte !</p>
    </main>
<?php
        return ob_get_clean();
    }
}
?>