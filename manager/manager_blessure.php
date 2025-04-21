<?php

class ManagerBlessure extends Blessure {
    
    // Récupérer toutes les blessures avec leur zone associée
    public function readBlessures(): array | string {
        try {
            $req = $this->getBdd()->prepare('
                SELECT 
                    B.id_blessure, 
                    B.description_blessure, 
                    B.image_blessure, 
                    B.image_blessure_1, 
                    B.image_blessure_2, 
                    B.image_blessure_3, 
                    B.recommandation, 
                    B.specialiste_blessure,
                    Z.id_zone_blessure,
                    Z.nom_zone_blessure,
                    Z.description_zone
                FROM Blessure B
                LEFT JOIN Zone_blessure Z ON B.id_zone_blessure = Z.id_zone_blessure
            ');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    // Récupérer une blessure par son ID
    public function readBlessureById(): array | string {
        try {
            $req = $this->getBdd()->prepare('
                SELECT 
                    B.id_blessure, 
                    B.description_blessure, 
                    B.image_blessure, 
                    B.image_blessure_1, 
                    B.image_blessure_2, 
                    B.image_blessure_3, 
                    B.recommandation, 
                    B.specialiste_blessure,
                    Z.id_zone_blessure,
                    Z.nom_zone_blessure,
                    Z.description_zone
                FROM Blessure B
                LEFT JOIN Zone_blessure Z ON B.id_zone_blessure = Z.id_zone_blessure
                WHERE B.id_blessure = ? LIMIT 1
            ');
            $id = $this->getId();
            $req->bindParam(1, $id, PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data ?: "Blessure non trouvée";
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    // Insérer une nouvelle blessure
    public function createBlessure(): string {
        try {
            $req = $this->getBdd()->prepare('
                INSERT INTO Blessure (description_blessure, image_blessure, image_blessure_1, image_blessure_2, image_blessure_3, recommandation, specialiste_blessure, id_zone_blessure) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $description = $this->getDescription();
            $image = $this->getImage();
            $image1 = $this->getImage1();
            $image2 = $this->getImage2();
            $image3 = $this->getImage3();
            $recommandation = $this->getRecommandation();
            $specialiste = $this->getSpecialiste();
            $id_zone = $this->getIdZoneBlessure();

            $req->bindParam(1, $description, PDO::PARAM_STR);
            $req->bindParam(2, $image, PDO::PARAM_STR);
            $req->bindParam(3, $image1, PDO::PARAM_STR);
            $req->bindParam(4, $image2, PDO::PARAM_STR);
            $req->bindParam(5, $image3, PDO::PARAM_STR);
            $req->bindParam(6, $recommandation, PDO::PARAM_STR);
            $req->bindParam(7, $specialiste, PDO::PARAM_STR);
            $req->bindParam(8, $id_zone, PDO::PARAM_INT);

            $req->execute();
            return "Blessure enregistrée avec succès !";
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    // Mettre à jour une blessure
    public function updateBlessure(): string {
        try {
            $req = $this->getBdd()->prepare('
                UPDATE Blessure 
                SET description_blessure = ?, image_blessure = ?, image_blessure_1 = ?, image_blessure_2 = ?, image_blessure_3 = ?, recommandation = ?, specialiste_blessure = ?, id_zone_blessure = ? 
                WHERE id_blessure = ?
            ');
            $description = $this->getDescription();
            $image = $this->getImage();
            $image1 = $this->getImage1();
            $image2 = $this->getImage2();
            $image3 = $this->getImage3();
            $recommandation = $this->getRecommandation();
            $specialiste = $this->getSpecialiste();
            $id_zone = $this->getIdZoneBlessure();
            $id = $this->getId();

            $req->bindParam(1, $description, PDO::PARAM_STR);
            $req->bindParam(2, $image, PDO::PARAM_STR);
            $req->bindParam(3, $image1, PDO::PARAM_STR);
            $req->bindParam(4, $image2, PDO::PARAM_STR);
            $req->bindParam(5, $image3, PDO::PARAM_STR);
            $req->bindParam(6, $recommandation, PDO::PARAM_STR);
            $req->bindParam(7, $specialiste, PDO::PARAM_STR);
            $req->bindParam(8, $id_zone, PDO::PARAM_INT);
            $req->bindParam(9, $id, PDO::PARAM_INT);

            if ($req->execute()) {
                return "Mise à jour réussie pour la blessure ID $id.";
            } else {
                return "Échec de la mise à jour.";
            }
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function getAllBlessures(): array {  //il manque un bind param
        // Récupérer toutes les blessures avec leur zone associée
        
        $req = $this->getBdd()->prepare("SELECT b.*, z.nom_zone_blessure 
                FROM Blessure b
                LEFT JOIN Zone_blessure z ON b.id_zone_blessure = z.id_zone_blessure");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


    public function readBlessuresByZone(int $id_zone_blessure): array {
        try {
            $req = $this->getBdd()->prepare('
                SELECT B.id_blessure, B.nom_blessure, B.description_blessure, 
                B.image_blessure, B.recommandation, B.specialiste_blessure, 
                Z.nom_zone_blessure
                FROM Blessure B
                LEFT JOIN Zone_blessure Z ON B.id_zone_blessure = Z.id_zone_blessure
                WHERE B.id_zone_blessure = ?
            ');
    
            $req->bindParam(1, $id_zone_blessure, PDO::PARAM_INT);
            $req->execute(); //$req->execute([$id_zone_blessure]);
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            
            return $data ?: [];
        } catch (PDOException $error) {
            error_log("Erreur SQL : " . $error->getMessage());
            return [];
        }
    }


    public function checkZoneExists(int $id_zone_blessure): bool {
        try {
            $req = $this->getBdd()->prepare('
                SELECT COUNT(*) FROM Zone_blessure 
                WHERE id_zone_blessure = ?
            ');
            // Préparer la requête pour vérifier l'existence de la zone
            $req->bindParam(1, $id_zone_blessure, PDO::PARAM_INT);
            $req->execute();
            // Récupérer le nombre de lignes
            return (int)$req->fetchColumn() > 0;
        } catch (Exception $error) {
            error_log("Erreur lors de la vérification de la zone: " . $error->getMessage());
            return false;
        }
    }
    

    // Supprimer une blessure
    public function deleteBlessure(): string {
        try {
            $req = $this->getBdd()->prepare('DELETE FROM Blessure WHERE id_blessure = ?');
            $id = $this->getId();

            $req->bindParam(1, $id, PDO::PARAM_INT);
            if ($req->execute()) {
                return "Blessure ID $id supprimée avec succès.";
            } else {
                return "Échec de la suppression.";
            }
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}

?>
