<header>
    <?php
    include_once ROOT . "views/layout/header.php";
    ?>

</header>
<style>
        footer {
            background-color: #343a40; /* Couleur de fond */
            color: #fff; /* Couleur du texte */
            text-align: center; /* Alignement du texte au centre */
            padding: 10px 0; /* Espacement interne */
            position: relative; /* Position fixe en bas */
            width: 100%; /* Largeur de 100% */
            bottom: 0; /* Alignement en bas */
            left: 0; /* Alignement à gauche */
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1); /* Ombre douce en haut */
        }
        /* Style du texte */
        footer p {
            font-size: 0.8rem; /* Taille de la police */
            font-weight: bold; /* Police en gras */
            margin: 0; /* Aucune marge */
            padding-bottom: 5px; /* Espacement en bas */
        }
        /* Style du lien */
        footer a {
            color: #fff; /* Couleur du lien */
            text-decoration: none; /* Aucun soulignement */
            transition: color 0.3s; /* Animation de transition */
        }
        footer a:hover {
            color: #ffc107; /* Couleur du lien au survol */
        }
    </style>
<main class="container">
    <?php
    echo $contenu;
    ?>
</main>
<footer>
        <marquee>Copyright &copy; 2024 - Patricia Shopping <a href="#">(Our Purpose Is To Sustainably Make the Pleasure and Benefits of
        Bijoux Accessible to the Many. Version francais: Notre objectif est de rendre durable le plaisir et les avantages de
         Des bijoux accessibles au plus grand nombre) </a></marquee>
    </footer>
