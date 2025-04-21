<?php 
//INCLUDE -------------------------------

include './utils/Bdd.php';
include './model/User.php';
include './manager/manager_user.php';
include './view/view_inscription.php';
include './controller.php';


class ControllerInscription extends Controller{
    //ATTRIBUTS
    private ?ManagerUser $user;
    private ?ViewInscription $inscription;

    //CONSTRUCTEUR
    public function __construct(){
        $this->user = new ManagerUser(connect());
        $this->inscription = new ViewInscription();
        $this->setHeader(new ViewHeader(""));
        $this->setFooter(new ViewFooter());
    }

    //GETTER ET SETTER
    public function getUser(): ?ManagerUser { 
        return $this->user; 
    }
        //++++++++++++++++++++SI CA NE MARCHE PLUS REMETTRE ?USER PLACE DE MANAGERUSER
    public function setUser(?ManagerUser $nUser): ControllerInscription { 
        $this->user = $nUser; 
        return $this; 
    }

    public function getInscription(): ?ViewInscription { 
        return $this->inscription; 
    }
    public function setInscription(?ViewInscription $Ninscription): ControllerInscription { 
        $this->inscription = $Ninscription; 
        return $this; 
    }

    //METHOD
    public function logInUser(){
        //Vérifier la réception du formulaire
        if(isset($_POST['login_submit'])){
            //Vérifie que les champs ne sont pas vides
            if(isset($_POST['email2']) && !empty($_POST['email2'])
            && isset($_POST['password2']) && !empty($_POST['password2'])){
                //Vérifie que l'email est au bon format
                if(filter_var($_POST['email2'],FILTER_VALIDATE_EMAIL)){
                    //Nettoyage des données
                    $email = sanitizeGuigui($_POST['email2']);
                    $password = sanitizeGuigui($_POST['password2']);

                    //J'enregistre les données dans le Modele User
                    $this->getUser()->setEmail($email)->setPassword($password);

                    //Je récupère les données utilisateur inscrit en BDD selon l'email entré
                    $data = $this->getUser()->readUserByMail();

                    //Vérifie que j'ai un utilisateur
                    if(!empty($data)){
                        //Vérifie la correspondance des mots de passe
                        if(password_verify($password,$data[0]['password_utilisateur'])){
                            //J'enregistre les infos en $_SESSION
                            $_SESSION['id_utilisateur'] = $data[0]['id_utilisateur'];
                            $_SESSION['nom_utilisateur'] = $data[0]['nom_utilisateur'];
                            $_SESSION['prenom_utilisateur'] = $data[0]['prenom_utilisateur'];
                            $_SESSION['email_utilisateur'] = $data[0]['email_utilisateur'];
                            $_SESSION['id_role'] = $data[0]['id_role'];

                            //je redirige selon le role user ou admin de ma bdd
                            if (isset($_SESSION['id_role']) && $_SESSION['id_role'] === 2){
                                header('Location:controller_admin.php');
                                exit;
                            } else {
                                // //Rediriger vers la page de accueil
                                header('Location:controller_accueilFR.php');
                                exit;
                            }

                        }else{
                            $this->inscription->setMessage("Login ou Mot de passe incorrect !");
                        
                            
                        }

                    }else{
                        $this->inscription->setMessage("Aucun compte trouvé. ");
                        
                    }
                }else{
                    $this->inscription->setMessage("L'email n'est pas au bon format !");
                }

            }else{
                $this->inscription->setMessage("Veuillez remplir tous les champs !");
            }
        }
    }


    public function registerUser():void{
        //Vérifier que je reçois le formulaire d'incription
        if(isset($_POST['register_submit'])){
            //Vérifie que les données ne sont pas vides
            if(isset($_POST['lastname']) && !empty($_POST['lastname'])
            && isset($_POST['firstname']) && !empty($_POST['firstname'])
            && isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['password']) && !empty($_POST['password'])
            && isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify'])){
                    //Vérifier que le mail est au bon format
                    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                            //Vérifie que les 2 mots de passe correspondent
                            if($_POST['password'] === $_POST['passwordVerify']){
                                    //Nettoyage des données
                                    $lastName = sanitizeGuigui($_POST['lastname']);
                                    $firstName = sanitizeGuigui($_POST['firstname']);
                                    $email = sanitizeGuigui($_POST['email']);
                                    $password = sanitizeGuigui($_POST['password']);
                                    //Hasher le mot de passe
                                    $password = password_hash($password, PASSWORD_BCRYPT);
                                    //Vérifier si l'utilisateur est déjà enregistré ou pas en BDD
                                    //Enregistrement des données dans l'objet ModelUser
                                    $this->getUser()->setLastName($lastName)->setFirstName($firstName)->setEmail($email)->setPassword($password);
    
                                    $data = $this->getUser()->readUserByMail();
    
                                    //Vérifie si $data est vide, pour savoir si l'email est disponible à l'enregistrement
                                    if(empty($data)){
                                                
                                        //On commence à enregistrer le compte, car l'email est disponible et j'enregistre le message dans mon accueil
                                        $this->getHeader()->setMessage($this->getUser()->createUser());
                                        
                                        header('Location:controller_accueilFR.php');
                                        $this->getHeader()->setMessage('Création de compte validé!');
                                        exit;
    
                                    }else{
                                        $this->inscription->setMessage("Cet email est déjà utilisé par un autre compte !");
                                        
                                        
                                    }
    
                            }else{
                                $this->inscription->setMessage("Les mots de passe ne correspondent pas.");
                                // $_SESSION['message'] = $this->getHeader()->getMessage();
                            }
                    }else{
                        $this->inscription->setMessage("Votre email n'est pas au bon format !");
                    }
            }else{
                $this->inscription->setMessage("Tous les champs doivent être remplis.");
            }
        }
    
    }
    public function renderViews():void{
        ob_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['register_submit'])) {
                $this->registerUser(); // Appelle la méthode d'inscription
            } elseif (isset($_POST['login_submit'])) {
                $this->logInUser(); // Appelle la méthode de connexion
            }
        }
    
        // Redirection si l'utilisateur est connecté
        // if (isset($_SESSION['id_utilisateur']) && !empty($_SESSION['id_utilisateur'])) {
        //     header('Location: controller_accueilFR.php');
        //     exit;
        // }
    
        echo $this->renderHeader();
        echo $this->inscription->render();
        echo $this->getFooter()->render();
    }
}

//Création du controller
$inscription = new ControllerInscription();
//lancement du rendu
$inscription->renderViews();


?>





