<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond */
        }
        .container {
            padding: 20px;
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
            font-size: 1rem; /* Taille de police des boutons */
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <h1 class="text-center mt-5 mb-4">Admin Panel</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>ID Commande</th>
                    <th>Nom Utilisateur</th>
                    <th>Nom Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Date Commande</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cpt = 1;
                foreach ($commandes as $commande) {
                    ?>
                    <tr>
                        <th scope="row"><?= $cpt++; ?></th>
                        <td><?= $commande->id_commande; ?></td>
                        <td><?= $commande->nom_utilisateur; ?></td>
                        <td><?= $commande->nom_produit; ?></td>
                        <td><?= $commande->prix; ?></td>
                        <td><?= $commande->quantite; ?></td>
                        <td><?= $commande->date_creation; ?></td>
                        <td>
                            <a class="btn btn-danger ms-2" href="<?= URI . "commandes/supprimer/{$commande->id_commande}"; ?>">Annuler la commande</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
