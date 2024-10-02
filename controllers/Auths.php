<?php

class Auths extends Controllers
{
    public function __construct()
    {
        parent::__construct();

    }

    public function inscription()
    {
        if (isset($_SESSION['Utilisateur'])) {
            header("Location: " . URI . "films/index");
        }
        if (isset($_POST["inscription"])) {
            if ($this->isValid($_POST)) {
                if ($_POST["mot_de_passe"] === $_POST["c_mot_de_passe"]) {
                    unset($_POST["c_mot_de_passe"], $_POST["inscription"]);
                    $_POST["mot_de_passe"] = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
                    $_POST["id_role"] = Auth::CLIENT;
                    $auth = new Auth();
                    $auth->inscription($_POST);
                    header("Location: " . URI . "auths/connexion");
                }

            }

        }
        $this->render("inscription");

    }

    public function connexion()
    {
        if (isset($_SESSION['Utilisateur'])) {
            header("Location: " . URI . "bijouxs/index");
        }

        if (isset($_POST['submit'])) {
            if ($this->isValid($_POST)) {
                $mot_de_passe = $_POST['mot_de_passe'];
                unset($_POST['submit'], $_POST['mot_de_passe']);
                $auth = new Auth();
                $user = $auth->findByEmail($_POST);
                if ($user) {
                    if (password_verify($mot_de_passe, $user->mot_de_passe)) {
                        $_SESSION['Utilisateur'] = $user;
                        header("Location: " . URI . "bijouxs/index");
                    } else {
                        echo "password invalid";
                    }
                } else {
                    echo "Email or password invalid";
                }
            } else {
                echo "fields invalid, please check it!";
            }

        }
        $this->render('connexion');
    }

    public function deconnexion()
    {
        unset($_SESSION['Utilisateur']);

        header("Location: " . URI . "bijouxs/index");

    }
    public function admin()
{
    if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->description == 'admin') {
        $authModel = new Auth();
        $utilisateurs = $authModel->getAllUtilisateurs(); // Assurez-vous d'avoir une méthode pour récupérer tous les utilisateurs dans votre modèle Auth
        $this->render('admin', compact('utilisateurs'));
    } else {
        header("Location: " . URI . "auths/index");
        exit;
    }
}


    public function supprimer($id_utilisateur)
    {
        // Vérifier si l'utilisateur est connecté et est un administrateur
        if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->id_role == Auth::ADMIN) {
            // Supprimer l'utilisateur
            $authModel = new Auth();
            $authModel->deleteById(['id_utilisateur' => $id_utilisateur]);

            // Rediriger l'utilisateur vers la page admin après la suppression
            header("Location: " . URI . "auths/admin");
            exit;
        }
        header("Location: " . URI . "auths/connexion");
    }
    public function modifier($id_bijoux)
    {
        if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->description == 'admin') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["modifier"])) {
                $bijouxModel = new Bijoux();
                $data = [
                    'nom' => $_POST['nom'],
                    'prix' => $_POST['prix'],
                    'description' => $_POST['description'],
                    'courte_description' => $_POST['courte_description'],
                    'quantite' => $_POST['quantite']
                ];
    
                // Vérifiez si une nouvelle image est téléchargée
                if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    // Générez un nom de fichier unique
                    $image_name = uniqid() . '_' . $_FILES['image']['name'];
                    
                    // Définissez le chemin de destination de l'image
                    $image_destination = "assets/images/" . $image_name;
                    
                    // Déplacez le fichier téléchargé vers le dossier des images
                    move_uploaded_file($_FILES['image']['tmp_name'], $image_destination);
                    
                    // Ajoutez le chemin de l'image à $data pour la mise à jour
                    $data['chemin_image'] = $image_destination;
                }
                
                // Effectuez la mise à jour du bijou avec les données modifiées
                if ($bijouxModel->modifier($data, $id_bijoux)) {
                    header("Location: " . URI . "bijouxs/admin");
                    exit;
                } else {
                    // Gérer l'erreur de modification
                }
            } else {
                $bijouxModel = new Bijoux();
                $bijoux = $bijouxModel->getOneById(["id_bijoux" => $id_bijoux]);
                $this->render('modifier', compact('bijoux'));
            }
        } else {
            header("Location: " . URI . "bijouxs/index");
            exit;
        }
    }
    

public function profil()
{
    if (isset($_SESSION['Utilisateur'])) {
        $utilisateur = $_SESSION['Utilisateur'];
        $this->render('profil', compact('utilisateur'));
    } else {
        header("Location: " . URI . "bijouxs/index");
        exit;
    }
}


}


?>