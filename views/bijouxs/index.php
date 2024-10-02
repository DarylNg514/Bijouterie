<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Couleur de fond de la page */
        }
         
        .message {
            background-color: #fff; /* Couleur de fond du message */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation de transition */
        }

        .message:hover {
            transform: translateY(-5px); /* Légère élévation au survol */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Ombre plus prononcée au survol */
        }

        h1 {
            font-size: 2.5rem; /* Taille de la police */
            color: #333; /* Couleur du texte */
            margin-bottom: 10px; /* Marge inférieure */
        }

        p {
            font-size: 1.2rem; /* Taille de la police */
            color: #666; /* Couleur du texte */
        }


        .container {
            padding-top: 50px; /* Espace au-dessus du contenu */
        }

        .card {
            border: none; /* Suppression de la bordure */
            border-radius: 15px; /* Coins arrondis */
            background-color: #fff; /* Couleur de fond */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation au survol */
        }

        .card:hover {
            transform: translateY(-5px); /* Légère élévation au survol */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Ombre plus prononcée au survol */
        }

        .card-img-top {
            border-top-left-radius: 15px; /* Coins arrondis pour l'image */
            border-top-right-radius: 15px;
            object-fit: cover; /* Ajustement de l'image */
            height: 250px; /* Hauteur légèrement augmentée */
        }

        .card-title {
            font-size: 1.25rem; /* Taille du titre */
            color: #333; /* Couleur du texte */
        }

        .card-text {
            color: #666; /* Couleur du texte */
        }

        .btn-primary {
            background-color: #007bff; /* Couleur de fond du bouton */
            border: none; /* Suppression de la bordure */
            transition: background-color 0.3s ease; /* Animation au survol */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Couleur de fond au survol */
        }
    </style>
</head>
<body>
<div class="container">
<div class="message">
    <h1>Bienvenue sur notre site !</h1>
    <p>Découvrez notre collection exclusive de bijoux artisanaux.</p>
</div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($bijouxs as $bijoux) : ?>
            <div class="col">
                <div class="card">
                    <img src="<?= (isset($bijoux->chemin_image)) ? URI . $bijoux->chemin_image : URI . "assets/image.jpeg"; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $bijoux->nom; ?></h5>
                        <p class="card-text"><?= $bijoux->courte_description; ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center">
                        <h3 class="text-primary"><?= $bijoux->prix; ?>$</h3>
                        <a href="<?= URI . "paniers/ajouter/" . $bijoux->id_bijoux; ?>" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
