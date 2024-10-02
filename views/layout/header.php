<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .navbar {
            background-color: #007bff; /* Couleur de fond de la barre de navigation */
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre douce */
        }

        .navbar-brand {
            color: white; /* Couleur du texte de la marque */
        }

        .navbar-toggler {
            border-color: white; /* Couleur de la bordure du bouton de bascule */
        }

        .navbar-toggler-icon {
            background-color: white; /* Couleur de l'icône du bouton de bascule */
        }

        .navbar-nav .nav-link {
            color: white !important; /* Couleur du texte des liens de navigation */
            transition: color 0.3s; /* Animation de transition */
            padding: 10px;
            border-radius: 8px;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Couleur de fond au survol */
        }

        .navbar-nav .nav-item.active .nav-link {
            background-color: rgba(255, 255, 255, 0.3); /* Couleur de fond lorsque le lien est actif */
        }

        .btn-primary {
            background-color: #28a745; /* Couleur de fond du bouton panier */
            border-color: #28a745; /* Couleur de la bordure du bouton panier */
            transition: background-color 0.3s, border-color 0.3s; /* Animation de transition */
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #218838; /* Couleur de fond du bouton panier au survol */
            border-color: #1e7e34; /* Couleur de la bordure du bouton panier au survol */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Welcome</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URI . "bijouxs/index"; ?>">Home</a>
                </li>
                <?php if (isset($_SESSION['Utilisateur']) && $_SESSION['Utilisateur']->description == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . "bijouxs/admin"; ?>">Gestion Produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . "auths/admin"; ?>">Gestion Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . "commandes/index"; ?>">Gestion Commandes</a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['Utilisateur'])) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . "auths/profil"; ?>">Profils</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . "auths/deconnexion"; ?>">Deconnexion</a>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . "auths/connexion"; ?>">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URI . "auths/inscription"; ?>">Inscription</a>
                    </li>
                </ul>
            <?php endif; ?>

            <a class="btn btn-primary" href="<?= URI . "paniers/index"; ?>"><i class="bi bi-cart4"><?=
                    (isset($_SESSION[Panier::PANIERS])) ?
                        count($_SESSION[Panier::PANIERS]) : 0;
                    ?></i></a>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
