<?php

class Commandes extends Controllers
{
    public function payer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payer'])) {
            // Assurez-vous d'avoir les données nécessaires depuis le formulaire de paiement
            $id_utilisateur = $_SESSION['Utilisateur']->id_utilisateur; // Supposons que l'id de l'utilisateur est stocké en session
            $id_bijoux = $_POST['id_bijoux'];
            $quantite = $_POST['quantite'];
            $prix_total = $_POST['prix_total']; // Supposons que le prix total est calculé côté serveur pour des raisons de sécurité
            $mode_paiement = $_POST['mode_paiement'];

            // Instancier le modèle Commande
            $commandeModel = new Commande();

            // Insérer la commande dans la table commande
            $id_commande = $commandeModel->insererCommande($id_utilisateur, $quantite, $prix_total, $mode_paiement);

            // Associer le produit à la commande dans la table bijouxcommande
            $commandeModel->associerProduitCommande($id_commande, $id_bijoux, $quantite);

            // Rediriger l'utilisateur vers une page de confirmation ou une autre page appropriée
            header("Location: " . URI . "confirmation.php");
            exit;
        } else {
            // Gérer le cas où la requête n'est pas de type POST ou si le paramètre 'payer' n'est pas défini
            // Rediriger l'utilisateur vers une page d'erreur ou une autre page appropriée
            header("Location: " . URI . "erreur.php");
            exit;
        }
    }
    public function index()
    {
        $commandeModel = new Commande();
        // Appel de la méthode du modèle pour récupérer toutes les commandes
        $commandes = $commandeModel->getAllCommandes();
        
        $this->render('index', compact('commandes'));
    }
    public function supprimer($id_commande)
    {
        if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->description == 'admin' && is_numeric($id_commande)) {
            $commandeModel = new Commande(); // Correction : Utilisez le modèle approprié pour les commandes
            $commandeModel->supprimer($id_commande); // Correction : Appel de la méthode de suppression dans le modèle des commandes
        }
        header("Location: " . URI . "commandes/index");
    }
    
    
}

?>
