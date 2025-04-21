<?php 


//import des includes
include './controller.php';
include './view/view_3d.php';




class Controller3d extends Controller {

    private ?View3d $view3d;

    private ?ManagerUser $user;

    public function __construct(){
        $this->view3d = new View3d();
        $this->setHeader(new ViewHeader(""));
        $this->setFooter(new ViewFooter());
    }

//GETTER SETTER

    public function getView3d(): View3d {
        return $this->view3d;
    }
    public function getUser(): ?ManagerUser {
        return $this->user;
    }


    public function setView3d(View3d $newView3d){
        $this->view3d = $newView3d;
        return $this;
    }
    public function setUser(?View3d $newUser):?Controller3d{
        $this->user = $newUser;
        return $this;
    }

    //METHODE 



    public function isAdmin():void{
    }

    public function renderViews():void{
        //Je vérifie si quelqu'un est connecté
        $this->isAdmin();
        
        //J'effectue le rendu de mes views
        echo $this->getHeader()->render();
        echo $this->getView3d()->render();
        echo $this->getFooter()->render();
    }
    }

$view3d = new Controller3d();

$view3d->renderViews();
















?>