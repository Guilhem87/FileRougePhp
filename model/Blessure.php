<?php

class Blessure {
    private int $id_blessure;
    private string $description_blessure;
    private ?string $image_blessure;
    private ?string $image_blessure_1;
    private ?string $image_blessure_2;
    private ?string $image_blessure_3;
    private ?string $recommandation;
    private ?string $specialiste_blessure;
    private ?int $id_zone_blessure;
    private PDO $bdd;

    // Constructeur
    public function __construct(PDO $bdd) {
        $this->bdd = connect();
    }

    // Getters
    public function getId(): int {
        return $this->id_blessure;
    }

    public function getDescription(): string {
        return $this->description_blessure;
    }

    public function getImage(): ?string {
        return $this->image_blessure;
    }

    public function getImage1(): ?string {
        return $this->image_blessure_1;
    }

    public function getImage2(): ?string {
        return $this->image_blessure_2;
    }

    public function getImage3(): ?string {
        return $this->image_blessure_3;
    }

    public function getRecommandation(): ?string {
        return $this->recommandation;
    }

    public function getSpecialiste(): ?string {
        return $this->specialiste_blessure;
    }

    public function getIdZoneBlessure(): ?int {
        return $this->id_zone_blessure;
    }

    public function getBdd(): PDO {
        return $this->bdd;
    }

    // Setters
    public function setId(int $id): void {
        $this->id_blessure = $id;
    }

    public function setDescription(string $description): void {
        $this->description_blessure = $description;
    }

    public function setImage(?string $image): void {
        $this->image_blessure = $image;
    }

    public function setImage1(?string $image1): void {
        $this->image_blessure_1 = $image1;
    }

    public function setImage2(?string $image2): void {
        $this->image_blessure_2 = $image2;
    }

    public function setImage3(?string $image3): void {
        $this->image_blessure_3 = $image3;
    }

    public function setRecommandation(?string $recommandation): void {
        $this->recommandation = $recommandation;
    }

    public function setSpecialiste(?string $specialiste): void {
        $this->specialiste_blessure = $specialiste;
    }

    public function setIdZoneBlessure(?int $id_zone): void {
        $this->id_zone_blessure = $id_zone;
    }
}

?>
