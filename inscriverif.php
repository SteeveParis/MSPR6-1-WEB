<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'helpcity';
    $db_host     = 'localhost';
    $db = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Récupération des données du formulaire
    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

    // Vérification si l'utilisateur existe déjà
    $check_user_query = "SELECT * FROM utilisateur WHERE nom = '$username'";
    $check_user_result = $db->query($check_user_query);

    if ($check_user_result->num_rows > 0) {
        $error_message = "Le nom d'utilisateur existe déjà. Veuillez en choisir un autre.";
    } else {
        // Insérer l'utilisateur dans la base de données
        $insert_user_query = "INSERT INTO utilisateur (nom, mdp) VALUES ('$username', '$password')";
        if ($db->query($insert_user_query) === TRUE) {
            $_SESSION['username'] = $username;
            header('Location: connexion.php');
            exit;
        } else {
            $error_message = "Erreur lors de l'inscription. Veuillez réessayer.";
            header('Location: inscription.php');
        }
    }

    $db->close();
}
?>