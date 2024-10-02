<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <!-- Inclure Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-5BcxJm09xTwyssR7A4GgCDZgbgGvM+J9qHaeOG9LZgeYybXGX6SR83V2BqdW73oH9D8fktV2gy01JZwASFXgCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }
        
        .container {
            flex: 1;
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: auto;
        }
        
        h1 {
            color: #333;
        }
        
        .profile-img {
            font-size: 5em; /* Taille de l'icône */
            color: #333; /* Couleur de l'icône */
            margin: 0 auto 20px;
        }
        
        .profile-info {
            margin-top: 20px;
        }
        
        .profile-info p {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
        }
        
        .profile-info label {
            font-weight: bold;
        }
        
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-img">
            <!-- Utilisation de l'icône de Font Awesome -->
            <i class="fas fa-user-circle"></i>
        </div>
        <h1>Profil de l'utilisateur</h1>
        <div class="profile-info">
            <p><label>Nom:</label> <?php echo $utilisateur->nom; ?></p>
            <p><label>Prénom:</label> <?php echo $utilisateur->prenom; ?></p>
            <p><label>Email:</label> <?php echo $utilisateur->email; ?></p>
            <!-- Ajoutez d'autres informations de profil ici -->
        </div>
    </div>
    <footer>
        <p>Ceci est le footer de votre page.</p>
    </footer>
</body>
</html>
