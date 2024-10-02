<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Couleur de fond */
        }

        .container {
            padding-top: 50px; /* Espace au-dessus du contenu */
            width: 100%; /* Largeur à 100% */
            max-width: none; /* Aucune limite de largeur maximale */
        }

        .container-fluid {
            padding-right: 15px; /* Espacement droit */
            padding-left: 15px; /* Espacement gauche */
            margin-right: auto; /* Marge droite automatique */
            margin-left: auto; /* Marge gauche automatique */
        }

        .btn-primary, .btn-warning, .btn-danger {
            padding: 8px 20px; /* Espacement interne */
            font-size: 1rem; /* Taille de la police */
        }

        .table {
            background-color: #fff; /* Couleur de fond */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
            overflow: hidden; /* Masquer le dépassement */
        }

        .table th,
        .table td {
            border-top: none; /* Supprimer la bordure supérieure */
        }

        .table th {
            font-weight: bold; /* Police en gras */
            color: #333; /* Couleur du texte */
        }

        .table th, .table td {
            padding: 15px; /* Espacement interne */
        }

        .table img {
            max-width: 100px; /* Largeur maximale de l'image */
            height: auto; /* Hauteur automatique */
            border-radius: 8px; /* Coins arrondis */
        }

        .btn {
            border-radius: 8px; /* Coins arrondis */
            transition: background-color 0.3s ease; /* Animation de transition */
        }

        .btn:hover {
            filter: brightness(90%); /* Légère opacité au survol */
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <h1 class="text-center my-5">Admin Panel</h1>
    <div class="mb-3">
        <a class="btn btn-primary" href=<?= URI . "bijouxs/ajouter" ?>>Ajouter</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Quantité</th>
            <th scope="col">Courte Description</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $cpt = 1;
        foreach ($bijouxs as $bijoux) {
            ?>
            <tr>
                <th scope="row"><?= $cpt++; ?></th>
                <td><img src="<?=
                    (isset($bijoux->chemin_image)) ?
                        URI . $bijoux->chemin_image :
                        URI . "assets/image.jpeg";

                    ?>" alt="..."></td>
                <td><?= $bijoux->nom; ?></td>
                <td><?= $bijoux->prix; ?></td>
                <td><?= $bijoux->quantite; ?></td>
                <td><?= $bijoux->courte_description; ?></td>
                <td class="row">
                    <div class="col">
                        <a class="btn btn-warning" href="<?= URI . "bijouxs/modifier/$bijoux->id_bijoux"; ?>"><i class="bi bi-pencil-square"></i></a>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger" href="<?= URI . "bijouxs/supprimer/$bijoux->id_bijoux"; ?>"><i class="bi bi-trash3-fill"></i></a>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
