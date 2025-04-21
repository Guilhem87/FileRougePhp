<?php
class ViewInscription{
    //YD:ATTRIBUT
    private ?string $message;


    //YD:CONSTRUCTEUR
    public function __construct(){
        $this->message = "";
    }

    //GETTER ET SETTER
    public function getMessage(): ?string { 
        return $this->message; 
    }
    public function setMessage(?string $message): ViewInscription { 
        $this->message = $message; 
        return $this; 
    }

    //METHOD
    public function render(){
        ob_start();
?>
<main class="main_inscri">
        <article>
            <h2><strong>Connectez-vous ou <br>inscrivez-vous ! !</strong></h2>
            <div>
                <div>
                    <p><strong>Nouveau sur <span class="span2">S</span>port.<span class="span2">I</span>njury ?</strong></p>
                    <button id="b1"><strong> S'INSCRIRE</strong></button>
                    <div id="popup">
                        <div id="popup-content">
                            <span id="close-popup">&times;</span> <!--&times; est l'écriture du symbole croix ( X ) servira a fermer la pop up-->
                            <h2>Inscription</h2>
                            <form id="registerForm" action="controller_page_inscription.php" method="POST" type="register">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" placeholder="adresse mail"><br><br>
                                <label for="lastname">Nom:</label>
                                <input type="text" id="lastname" name="lastname" placeholder="ton petit nom"><br><br>
                                <label for="firstname">Prenom:</label>
                                <input type="text" id="firstname" name="firstname" placeholder="ton magnifique prénom" required><br><br>
                                <label for="password">Mot de passe:</label>
                                <input type="password" id="password" name="password" required><br><br>
                                <label for="passwordVerify">Vérifier le mot de passe :</label>
                                <input type="password" id="passwordVerify" name="passwordVerify" placeholder="Confirme ton mot de passe" required><br><br>
                                <button type="submit" name="register_submit">S'inscrire</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <p><strong>J'ai déjà un compte <span class=" span2">S</span>.<span class="span2">I</span><img src="./src/img/logo.png" alt="logoSI"></strong></p>
                    <button id="b2"><strong>SE CONNECTER</strong></button>
                    <div id="popup2">
                        <div id="popup-content">
                            <span id="close-popup2">&times;</span> <!--&times; est l'écriture du symbole croix ( X ) servira a fermer la pop up-->
                            <h2>Connexion</h2>
                            <form id="loginForm" action="controller_page_inscription.php" method="POST" type="login">
                                <label for="email2">@Email:</label>
                                <input type="email" type="text" id="email" name="email2" required><br><br>
                                <label for="password2">Mot de passe:</label>
                                <input type="password" id="password" name="password2" required><br><br>
                                <button type="submit" name="login_submit">Se connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <p><strong>Je prends rendez-vous sur <a href="https://www.doctolib.fr/" target="_blank">DoctoLib</a> <img href="https://www.doctolib.fr/" src="./src/img/icone-doctolib.png" alt="D"> </strong></p>
                <button onclick="window.open('https://www.doctolib.fr/sessions/new/username_sign_up?context=navigation_bar', '_blank');"><strong>JE ME CRÉE UN COMPTE<img class="logo_docto" src="./src/img/doctolib_logo.png" alt="logodoctolib"></strong></button>
            </div>
        </article>
        <img src="./src/img/full-shot-man-with-laptop.jpg" alt="inscription">
        <!--<article>

        </article>-->
    </main>

    <?php
        return ob_get_clean();
    }
}
?>