<?php
session_start();
if(isset($_POST['logout'])) {
    // Détruire toutes les données de session
    session_destroy();

    // Rediriger vers la page de connexion ou une autre page après la déconnexion
    header('Location: connexion.php');
    exit;
}
?>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleindex.css">
    <title>Nester</title>
</head>
    <header>
        <form method="post" action="">
            <input type="submit" name="logout" value="Déconnexion">
        </form>
        <p class="connecter">Connecté en tant que : <?php $username = $_SESSION['username']; echo "{$username}"; ?></p>
        <h1>MSPR6.1</h1>
        <nav>
            <ul>
                <li><a href="connexion.php">Connexion</a></li>
                <!--<li><a href="#">A propos</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                -->
            </ul>
        </nav>       
    </header>
<body>

    <section class="main-content">
        <h2>Tableau nmap</h2>
        <p class="titre">Ici s'afficheront les données de nmap dans un tableau </p>
    </section>
    <table id="tableau">
    <tr>
        <th>Nom</th>
        <th>Age</th>
        <th>Ville</th>
    </tr>
    <?php

// Chemin vers le dossier où vous souhaitez cloner le dépôt
$repoPath = 'C:\wamp64\www\WifiBot';

// URL du dépôt Git
$gitRepoUrl = 'https://github.com/Hedox1/MSPR-6-1.git';

// Cloner le dépôt Git dans le dossier spécifié
shell_exec("git clone $gitRepoUrl $repoPath");

// Accéder au dossier cloné
chdir($repoPath);

// Exécuter la commande Git pour obtenir les données que vous souhaitez
// Par exemple, obtenir la liste des fichiers dans la dernière révision
$files = shell_exec('git ls-tree --name-only HEAD');

// Diviser la chaîne de résultats en un tableau
$fileArray = explode("\n", trim($files));

// Afficher le tableau résultant
print_r($fileArray);

// Notez que cela est un exemple simple, et vous devrez adapter le code en fonction de vos besoins spécifiques.

?>
</body>
    <footer>
        <p>&copy; 2024 Mon Site Web. Tous droits reserves.</p>
    </footer>
</html>