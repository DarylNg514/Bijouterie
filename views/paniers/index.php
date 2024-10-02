<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond */
            font-family: Arial, sans-serif; /* Police de caractères */
        }
        .container {
            padding: 20px; /* Espacement intérieur */
        }
        .table {
            background-color: #fff; /* Couleur de fond du tableau */
            border-radius: 15px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
        }
        .table thead th {
            border: none; /* Suppression des bordures dans l'en-tête */
            background-color: #343a40; /* Couleur de fond de l'en-tête */
            color: #fff; /* Couleur du texte de l'en-tête */
        }
        .table tbody tr:hover {
            background-color: #f8f9fa; /* Couleur de fond au survol */
        }
        .btn {
            border-radius: 8px; /* Coins arrondis pour les boutons */
            transition: filter 0.3s ease; /* Animation de transition */
        }
        .btn:hover {
            filter: brightness(90%); /* Légère opacité au survol */
        }
        .btn-secondary {
            background-color: #6c757d; /* Couleur de fond du bouton secondaire */
            border-color: #6c757d; /* Couleur de la bordure du bouton secondaire */
            color: #fff; /* Couleur du texte du bouton secondaire */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Couleur de fond du bouton secondaire au survol */
            border-color: #545b62; /* Couleur de la bordure du bouton secondaire au survol */
            color: #fff; /* Couleur du texte du bouton secondaire au survol */
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center m-5">Mon panier</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantite</th>
                <th scope="col">Courte Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cpt = 1;
            foreach ($bijouxs as $bijoux) {
                $quantite = $bijoux[0];
                $bijoux = $bijoux[1];
            ?>
            <tr>
                <form action="<?= URI . "paniers/modifier/$bijoux->id_bijoux"; ?>" method="post">
                    <th scope="row"><?= $cpt++; ?></th>
                    <td><img height="100px" width="100px" src="<?= (isset($bijoux->chemin_image)) ? URI . $bijoux->chemin_image : URI . "assets/image.jpeg"; ?>" alt="..."></td>
                    <td><?= $bijoux->nom; ?></td>
                    <td><?= $bijoux->prix; ?></td>
                    <td><input type="number" name="quantite" min="0" max="<?= $bijoux->quantite; ?>" value="<?= $quantite; ?>"></td>
                    <td><?= $bijoux->courte_description; ?></td>
                    <td class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger" href="<?= URI . "paniers/supprimer/$bijoux->id_bijoux"; ?>"><i class="bi bi-trash3-fill"></i></a>
                        </div>
                    </td>
                </form>
                <td>
                    <form action="<?= URI . "paniers/payer/"; ?>" method="post" id="payment-form">
                        <!-- Ajoutez un champ caché pour stocker l'identifiant du bijou -->
                        <input type="hidden" name="id_bijoux" value="<?= $bijoux->id_bijoux ?>">
                        <!-- Ajoutez un champ caché pour stocker la quantité -->
                        <input type="hidden" name="quantite" value="<?= $quantite ?>">
                        <!-- Ajoutez un champ caché pour stocker le prix -->
                        <input type="hidden" name="prix" value="<?= $bijoux->prix ?>">
                        <!-- Bouton "Payer maintenant" -->
                        <div class="my-2">
                            <button name="payer" type="submit" class="btn btn-secondary"><i class="bi bi-credit-card"> Payer Maintenant </i></button>
                        </div>
                    </form>
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
