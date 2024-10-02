<?php

class Commande extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "commande";
    }

    public function insererCommande($id_utilisateur, $quantite, $prix_total)
    {
        $this->sql = "INSERT INTO " . $this->table . " (quantite, prix, statut, date_creation, id_utilisateur, mode_paiement) 
                      VALUES (:quantite, :prix, :statut, :date_creation, :id_utilisateur, :mode_paiement)";
        $params = [
            'quantite' => $quantite,
            'prix' => $prix_total,
            'statut' => 'En cours',
            'date_creation' => date('Y-m-d'),
            'id_utilisateur' => $id_utilisateur,
            'mode_paiement' => 'Paypal'
        ];
        $this->getLines($params, null);
        global $oPDO;
        return $oPDO->lastInsertId(); // Retourne l'ID de la commande insérée
    }

    public function associerProduitCommande($id_commande, $id_bijoux, $quantite)
    {
        $this->sql = "INSERT INTO bijouxcommande (id_bijoux, id_commande, quantite) 
                      VALUES (:id_bijoux, :id_commande, :quantite)";
        $params = [
            'id_bijoux' => $id_bijoux,
            'id_commande' => $id_commande,
            'quantite' => $quantite
        ];
        $this->getLines($params, null);
    }
    public function getAllCommandes()
    {
        // Récupération de toutes les commandes avec les informations sur l'utilisateur et le produit
        $this->sql = "SELECT c.*, u.nom AS nom_utilisateur, b.nom AS nom_produit
                      FROM " . $this->table . " c
                      JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
                      JOIN bijouxcommande bc ON c.id_commande = bc.id_commande
                      JOIN bijoux b ON bc.id_bijoux = b.id_bijoux";
        return $this->getLines();
    }
    public function deleteCommande($id_commande)
    {

            // Supprimez d'abord les enregistrements associés dans la table bijouxcommande
            $this->sql = "DELETE FROM bijouxcommande WHERE id_commande = :id_commande";
            $params = ['id_commande' => $id_commande];
            $this->getLines($this->sql, $params);
    
            // Ensuite, supprimez la commande elle-même de la table commande
            $this->sql = "DELETE FROM " . $this->table . " WHERE id_commande = :id_commande";
            $this->getLines($this->sql, $params);
            // Gérez les exceptions PDO (erreurs de base de données)
            echo "Erreur lors de la suppression de la commande : " ;
            return false; // La suppression a échoué
    }
    
    public function supprimer($id_commande)
    {
        try {
            // Supprimez d'abord les enregistrements associés dans la table bijouxcommande
            $this->sql = "DELETE FROM bijouxcommande WHERE id_commande = :id_commande";
            $params = ['id_commande' => $id_commande];
            $this->getLines($params, "DELETE");
    
            // Ensuite, supprimez la commande elle-même de la table commande
            $this->sql = "DELETE FROM $this->table WHERE id_commande = :id_commande";
            $this->getLines($params, "DELETE");
    
            // La suppression a réussi
            return true;
    
        } catch (PDOException $e) {
            // Gérez les exceptions PDO (erreurs de base de données)
            echo "Erreur lors de la suppression de la commande : " . $e->getMessage();
            return false; // La suppression a échoué
        }
    }
    

}

?>
