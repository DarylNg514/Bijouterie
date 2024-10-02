<?php

class Bijouxs extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $bijouxModel = new Bijoux(); 
        $bijouxs = $bijouxModel->getAllBijoux();
        $this->render('index', compact('bijouxs'));
    }

    public function ajouter()
    {
        if (isset($_SESSION['Utilisateur'])) {
            if ($_SESSION['Utilisateur']->description == 'admin') {
                if (isset($_POST["ajouter"])) {
                    if ($this->isValid($_POST)) {
                        unset($_POST["ajouter"]);
                        $bijouxModel = new Bijoux(); 
                        $bijouxModel->ajouter($_POST);
                        global $oPDO;
                        $id_bijoux = $oPDO->lastInsertId();
                        $this->importImage($id_bijoux);                    
                        header("Location: " . URI . "bijouxs/admin");
                        return;
                    }
                }
                $this->render('ajouter');
                return;
            }
        }
        header("Location: " . URI . "bijouxs/index");
    }

    public function admin()
    {
        if (isset($_SESSION['Utilisateur'])) {
            if ($_SESSION['Utilisateur']->description == 'admin') {
                $bijouxModel = new Bijoux(); 
                $bijouxs = $bijouxModel->getAllBijoux();
                $this->render('admin', compact('bijouxs'));
                return;
            }
        }
        header("Location: " . URI . "bijouxs/index");
    }

    public function supprimer($id_bijoux)
    {
        if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->description == 'admin' && is_numeric($id_bijoux)) {
            $bijouxModel = new Bijoux();
            $bijouxModel->supprimer($id_bijoux);
        }
        header("Location: " . URI . "bijouxs/admin");
    }
    public function modifier($id_bijoux)
{
    if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->description == 'admin') {
        $bijouxModel = new Bijoux();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["modifier"])) {
            $data = [
                'nom' => $_POST['nom'],
                'prix' => $_POST['prix'],
                'description' => $_POST['description'],
                'courte_description' => $_POST['courte_description'],
                'quantite' => $_POST['quantite']
            ];

            // Vérifier si une image a été téléchargée
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                // Mettre à jour l'image et le chemin de l'image
                $this->updateImage($id_bijoux);
            }

            // Modifier le bijou
            if ($bijouxModel->modifier($data, $id_bijoux)) {
                header("Location: " . URI . "bijouxs/admin");
                exit;
            } else {
                // Gérer l'erreur de modification
            }
        } else {
            // Afficher le formulaire de modification
            $bijoux = $bijouxModel->getOneById(["id_bijoux" => $id_bijoux]);
            $this->render('modifier', compact('bijoux'));
        }
    } else {
        // Rediriger vers la page d'accueil si l'utilisateur n'est pas un administrateur
        header("Location: " . URI . "bijouxs/index");
        exit;
    }
}
    public function importImage($id_bijoux)
    {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_destination = "assets/images/" . basename($image_name);

            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));
            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }

            if (move_uploaded_file($image_tmp, $image_destination)) {
                $imageModel = new Image(); 
                $data = [
                    "id_bijoux" => $id_bijoux,
                    "chemin_image" => $image_destination
                ];
                $imageModel->ajouter($data);
            }
        }
    }
    public function updateImage($id_bijoux)
    {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_destination = "assets/images/" . basename($image_name);

            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));
            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }

            if (move_uploaded_file($image_tmp, $image_destination)) {
                $imageModel = new Image(); 
                $data = [
                    "id_bijoux" => $id_bijoux,
                    "chemin_image" => $image_destination
                ];
                $imageModel->update($data,$id_bijoux);
            }
        }
    }
}

?>