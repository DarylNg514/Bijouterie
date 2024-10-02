<?php

class Bijoux extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "bijoux";
    }

    public function ajouter($data)
    {
        $this->sql = "insert into " . $this->table . "(
                 nom, 
                 prix,
                 description, 
                 courte_description,
                 quantite) VALUE ( :nom, 
                 :prix,
                 :description, 
                 :courte_description,
                 :quantite)";
        return $this->getLines($data, null);
    }

    public function getAllBijoux()
    {
        $this->sql = "select b.*,i.chemin_image from  $this->table 
                      b left join Image i  on b.id_bijoux = i.id_bijoux";
        return $this->getLines();

    }

    public function supprimer($data)
    {
        $this->sql = "delete from $this->table where id_bijoux = :id_bijoux";
        return $this->getLines($data, null);

    }

    public function getOneById($data)
    {
        $this->sql = "select b.*,i.chemin_image from  $this->table 
                      b left join Image i  on b.id_bijoux = i.id_bijoux where b.id_bijoux = :id_bijoux";
        return $this->getLines($data, true);
    }
    public function modifier($data, $id_bijoux)
    {
        try {
            // Construire la requête SQL pour la mise à jour
            $this->sql = "UPDATE " . $this->table . " SET 
                          nom = :nom, 
                          prix = :prix,
                          description = :description, 
                          courte_description = :courte_description,
                          quantite = :quantite
                          WHERE id_bijoux = :id_bijoux";
    
            // Ajouter l'identifiant du bijou à $data
            $data['id_bijoux'] = $id_bijoux;
    
            // Exécuter la requête préparée
            return $this->getLines($data, null);
        } catch (PDOException $e) {
            // Gérer les exceptions PDO (erreurs de base de données)
            echo "Erreur lors de la modification du bijou : " . $e->getMessage();
            return false; // La modification a échoué
        }
    }    

}