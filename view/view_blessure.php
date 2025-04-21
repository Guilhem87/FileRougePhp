<?php

class ViewBlessure {
    private array $blessures = [];

    public function setBlessures(array $blessures): void {
        $this->blessures = $blessures;
    }

    public function render(): void {
        ob_start();
    ?>

    <link rel="stylesheet" href="./src/style/style_pages.css">
    <link rel="stylesheet" href="./src/style/style_3d.css">
    <link rel="stylesheet" href="./src/style/style_global.css">
    <link rel="stylesheet" href="./src/style/style_blessure.css">
    

    <div class="bandeau-defilant">
        <div>
            <p>Attention, ce site ne remplace pas une consultation médicale ! Consultez un médecin pour un diagnostic.</p>
            <p>Attention, ce site ne remplace pas une consultation médicale ! Consultez un médecin pour un diagnostic.</p>
        </div>
    </div>

    <main id="main_corps">
    <?php if (!empty($this->blessures)): ?>
        <h2><strong><?= htmlspecialchars($this->blessures[0]['nom_zone_blessure']) ?></strong></h2>
        
        <div id="apropos"></div><br><br>
        <?php foreach ($this->blessures as $blessure): ?>
            <section class="blessure">
                <div class="blessure-text">
                    <h3><?= htmlspecialchars($blessure['nom_blessure']) ?></h3>
                    <p><strong>Description :</strong> <?= htmlspecialchars($blessure['description_blessure']) ?></p>
                    
                    <p><strong>Recommandation :</strong> <?= htmlspecialchars($blessure['recommandation'] ?? 'Aucune recommandation') ?></p>
                    <p><strong>Spécialiste conseillé :</strong> <?= htmlspecialchars($blessure['specialiste_blessure'] ?? 'Non spécifié') ?></p>
                </div>

                <div class="blessure-images">
                    <?php if ($blessure['image_blessure']): ?>
                        <img src="<?= htmlspecialchars($blessure['image_blessure']) ?>" alt="Image blessure" class="main-image">
                    <?php endif; ?>
                    
                    <?php if ($blessure['image_blessure_1']): ?>
                        <img src="<?= htmlspecialchars($blessure['image_blessure_1']) ?>" alt="Image blessure 1" class="secondary-image">
                    <?php endif; ?>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune blessure trouvée pour cette zone.</p>
    <?php endif; ?>
    </main>
    <script src="./src/script/intro_parties_corps.js"></script>

    <?php 
        ob_end_flush();
    }
}
?>
