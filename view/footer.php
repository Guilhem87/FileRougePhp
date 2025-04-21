
<?php

class ViewFooter{
    private ?string $message;

    public function __construct()
    {
        $this->message = "";
    }

    public function setMessage(?string $newMessage):ViewFooter {
        $this->message = $newMessage;
        return $this;
    }

    public function getMessage(): ?string {
        return $this->message;
    }


    public function render():string{
        ob_start();
?>

<footer>
        <<div>
            <img src="./src/img/Logo_SI-removebg.png" alt="logo_SI"><p>Copyright © 2024 SportInjury, tous droits réservés.</p>
        </div>
        <p class="error-message">
    <?php
    if (isset($_SESSION['message'])) {
        echo htmlspecialchars($_SESSION['message']);
        unset($_SESSION['message']); // Supprime le message après affichage
    }
    ?>
</p>

    </footer>
    <script type="module" src="./src/script/navbar.js"></script>
    <script type="module" src="./src/script/3d.js"></script>
    <script type="module" src="./src/script/inscription.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybSwVYvZtOZZjF+BxFtyfEn1MChiGcC6HOF4I4Sr5VUM4twI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php
        return ob_get_clean();
    }
}
?>