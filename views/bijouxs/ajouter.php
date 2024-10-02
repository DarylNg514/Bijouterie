<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Couleur de fond */
            padding-top: 50px; /* Espace au-dessus du contenu */
        }

        .container {
            max-width: 600px; /* Largeur maximale du formulaire */
            margin: auto; /* Centrer le formulaire */
            background-color: #fff; /* Couleur de fond */
            padding: 30px; /* Espacement interne */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
        }

        .form-label {
            font-weight: bold; /* Police en gras */
            color: #333; /* Couleur du texte */
        }

        .form-control {
            border: 2px solid #ced4da; /* Bordure */
            border-radius: 8px; /* Coins arrondis */
            transition: border-color 0.3s ease; /* Animation de transition */
        }

        .form-control:focus {
            border-color: #007bff; /* Couleur de la bordure au focus */
            outline: none; /* Suppression de l'outline */
        }

        .btn-success {
            background-color: #28a745; /* Couleur de fond du bouton */
            border-color: #28a745; /* Couleur de la bordure du bouton */
            border-radius: 8px; /* Coins arrondis */
            padding: 10px 20px; /* Espacement interne */
            font-size: 1rem; /* Taille de la police */
            font-weight: bold; /* Police en gras */
            transition: background-color 0.3s ease; /* Animation de transition */
        }

        .btn-success:hover {
            background-color: #218838; /* Couleur de fond au survol */
            border-color: #1e7e34; /* Couleur de la bordure au survol */
        }

        .form-floating textarea {
            height: 100px; /* Hauteur du textarea */
            resize: none; /* Interdire le redimensionnement */
        }

        .form-floating textarea.form-control {
            border: 2px solid #ced4da; /* Bordure */
            border-radius: 8px; /* Coins arrondis */
            transition: border-color 0.3s ease; /* Animation de transition */
        }

        .form-floating textarea.form-control:focus {
            border-color: #007bff; /* Couleur de la bordure au focus */
            outline: none; /* Suppression de l'outline */
        }
    </style>
</head>
<body>
<form method="post" class="container" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom">
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" name="prix" id="prix">
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" class="form-control" name="quantite" id="quantite">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" name="courte_description" placeholder=" " id="courte_description"></textarea>
        <label for="courte_description" class="form-label">Courte description</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" name="description" placeholder=" " id="description"></textarea>
        <label for="description" class="form-label">Description</label>
    </div>
    <br>
    <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter un Produit">
</form>
</body>
</html>
