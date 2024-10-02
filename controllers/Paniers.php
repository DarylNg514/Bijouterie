<?php

class Paniers extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $panier = new Panier();
        $bijouxs = $panier->getAll();

        $this->render("index", compact('bijouxs'));

    }

    public function payement()
    {
        // Rediriger vers la vue sans aucune donnée
        $this->render("payement");
    }
    

    public function modifier($id_bijoux)
    {

        if (is_numeric($id_bijoux)) {
            $quantite = $_POST['quantite'];
            if (isset($quantite) && is_numeric($quantite)) {
                $panier = new Panier();
                $panier->ajouter($id_bijoux, $quantite);
                header("Location: " . URI . "paniers/index");
            }
        }

    }

    public function ajouter($id_bijoux)
    {
        if (is_numeric($id_bijoux)) {
            $panier = new Panier();
            $panier->ajouter($id_bijoux, 1);
            header("Location: " . URI . "bijouxs/index");
        }
    }

    public function supprimer($id_bijoux)
    {
        if (is_numeric($id_bijoux)) {
            $panier = new Panier();
            $panier->supprimer($id_bijoux);
            header("Location: " . URI . "paniers/index");
        }
    }
    public function payer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payer'])) {
            // Assurez-vous d'avoir les données nécessaires depuis le formulaire de paiement
            $id_utilisateur = $_SESSION['Utilisateur']->id_utilisateur; // Supposons que l'id de l'utilisateur est stocké en session
            $id_bijoux = $_POST['id_bijoux'];
            $quantite = $_POST['quantite'];
            $prix_total = $_POST['prix']; // Supposons que le prix total est calculé côté serveur pour des raisons de sécurité

            // Instancier le modèle Commande
            $commandeModel = new Commande();

            // Insérer la commande dans la table commande
            $id_commande = $commandeModel->insererCommande($id_utilisateur, $quantite, $prix_total);

            // Associer le produit à la commande dans la table bijouxcommande
            $commandeModel->associerProduitCommande($id_commande, $id_bijoux, $quantite);

            // Rediriger l'utilisateur vers une page de confirmation ou une autre page appropriée
            header("Location: " . URI . "paniers/payement");
            exit;
        } else {
            // Gérer le cas où la requête n'est pas de type POST ou si le paramètre 'payer' n'est pas défini
            // Rediriger l'utilisateur vers une page d'erreur ou une autre page appropriée
            header("Location: " . URI . "bijouxs/index");
            exit;
        }
    }
}