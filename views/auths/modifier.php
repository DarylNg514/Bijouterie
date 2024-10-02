<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond */
            font-family: Arial, sans-serif; /* Police de caractères */
        }
        .container {
            padding: 20px; /* Espacement intérieur */
        }
        .form-label {
            font-weight: bold; /* Police en gras pour les étiquettes */
        }
        .form-control {
            border-radius: 8px; /* Coins arrondis pour les champs de formulaire */
        }
        .btn {
            border-radius: 8px; /* Coins arrondis pour les boutons */
            transition: filter 0.3s ease; /* Animation de transition */
        }
        .btn:hover {
            filter: brightness(90%); /* Légère opacité au survol */
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-4">Modifier Utilisateur</h1>
    <form action="<?= URI . "auths/modifier/{$utilisateur->id_utilisateur}"; ?>" method="post">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $utilisateur->nom; ?>" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $utilisateur->prenom; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $utilisateur->email; ?>" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="<?= $utilisateur->telephone; ?>" required>
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?= $utilisateur->date_naissance; ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_role" class="form-label">Rôle (Admin=1, Client=2)</label>
            <input type="number" class="form-control" id="id_role" name="id_role" min="1" max="2" value="<?= $utilisateur->id_role; ?>" required>
        </div>
        <div class="mb-3">
            <label for="mot_de_passe" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
        </div>
        <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
    </form>
</div>
</body>
</html>
