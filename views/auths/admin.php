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
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cpt = 1;
                foreach ($utilisateurs as $utilisateur) {
                    ?>
                    <tr>
                        <th scope="row"><?= $cpt++; ?></th>
                        <td><?= $utilisateur->nom; ?></td>
                        <td><?= $utilisateur->prenom; ?></td>
                        <td><?= $utilisateur->email; ?></td>
                        <td><?= $utilisateur->telephone; ?></td>
                        <td><?= $utilisateur->date_naissance; ?></td>
                        <td><?= $utilisateur->id_role == 1 ? 'Admin' : 'Client'; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= URI . "auths/modifier/{$utilisateur->id_utilisateur}"; ?>"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger ms-2" href="<?= URI . "auths/supprimer/{$utilisateur->id_utilisateur}"; ?>"><i class="bi bi-trash3-fill"></i></a>
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
