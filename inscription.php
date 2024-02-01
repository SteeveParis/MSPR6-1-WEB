<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="inscriverif.php" method="POST">
                <h1>INSCRIPTION</h1>
                
                <label><b>Identifiant</b></label>
                <input type="text" placeholder="Entrer l'identifiant" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='Validez' >
                <?php
                ?>
            </form>
        </div>
    </body>
</html>