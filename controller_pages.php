<?php 


include './controller.php';
include './view/view_pages.php';
// include './manager/manager_pages.php';
include './utils/Bdd.php';
// include './model/Pages.php';




class ControllerPages extends Controller {

    private ?ViewPages $viewPages;

    // private ?ManagerContent $managerContent;


    public function __construct(){
        // $pages = new Pages();
        $this->viewPages = new ViewPages();
        // $this->managerContent = new ManagerContent(connect());
        $this->setHeader(new ViewHeader(""));
        $this->setFooter(new ViewFooter());
    }

    public function getViewPages(): ViewPages {
        return $this->viewPages;
    }
    public function setViewPages(ViewPages $newViewPages): ControllerPages {
        $this->viewPages = $newViewPages;
        return $this;
    }

//METHODESSSSSSSS


public function handleSubmit(): ?array {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // return $this->managerContent->submitPages();
    }
    return null; // Retourne null si aucune soumission n'a été effectuée
}



public function render() {
}

    
    public function renderViews(): void {
        //rendu de mes views 
        echo $this->getHeader()->render();
        echo $this->viewPages->render();
        echo $this->getFooter()->render();
    }

}

$viewPages = new ControllerPages();

$viewPages->renderViews();


?>
