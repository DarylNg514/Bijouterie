<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Bijoux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Couleur de fond */
        }

        .container {
            padding-top: 50px; /* Espace au-dessus du contenu */
        }

        h1 {
            font-size: 2.5rem; /* Taille de la police */
            color: #333; /* Couleur du texte */
            margin-top: 50px; /* Marge supérieure */
            margin-bottom: 40px; /* Marge inférieure */
            text-align: center; /* Alignement centré */
            transition: color 0.3s ease; /* Animation de transition pour la couleur */
        }

        .form-label {
            font-weight: bold; /* Police en gras */
        }

        .form-control {
            border-radius: 10px; /* Coins arrondis */
            transition: border-color 0.3s ease; /* Animation de transition pour la couleur de la bordure */
        }

        .form-control:focus {
            border-color: #007bff; /* Couleur de la bordure au focus */
        }

        .btn-primary {
            background-color: #007bff; /* Couleur de fond du bouton */
            border-color: #007bff; /* Couleur de la bordure */
            border-radius: 10px; /* Coins arrondis */
            transition: background-color 0.3s ease, border-color 0.3s ease; /* Animation de transition */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Couleur de fond au survol */
            border-color: #0056b3; /* Couleur de la bordure au survol */
        }

        .btn-primary:active {
            transform: translateY(2px); /* Effet de pression au clic */
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Effet de mise en évidence au focus */
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier Bijoux</h1>
    <form action="<?= URI . "bijouxs/modifier/{$bijoux->id_bijoux}"; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $bijoux->nom; ?>" required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix" value="<?= $bijoux->prix; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= $bijoux->description; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="courte_description" class="form-label">Courte Description</label>
            <textarea class="form-control" id="courte_description" name="courte_description" rows="3"><?= $bijoux->courte_description; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $bijoux->quantite; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
    </form>
</div>
</body>
</html>
