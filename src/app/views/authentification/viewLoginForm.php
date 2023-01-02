    <?php include 'views/fragments/fragmentHeader.php'; ?>
    <body>
        <?php include 'views/fragments/fragmentNavbar.php';?>

        <div class="container pt-5 w-50">

            <?php
            // Affichage des erreurs de connexion
            if(isset($_GET['log_err']))
            {
                $err = htmlspecialchars($_GET['log_err']);
                echo('<div class="alert alert-warning" role="alert">');
                switch ($err) {
                    case "wrong-password" :
                        echo('Mauvais mot de passe');
                        break;
                    case "unknown-email" :
                        echo('Adresse email inconnue');
                        break;
                    case "empty-field" :
                        echo('Merci de remplir tous les champs');
                        break;
                }
                echo('</div>');
            }
            ?>

            <form action="router.php?action=connexion" method="post">
                <h1><b>Connexion</b></h1>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="required">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe" required="required">
                </div>

                <button type="submit" class="btn btn-success">Connexion</button>
            </form>
            <p>Pas encore enregistré ? Cliquez <a href="router.php?action=inscriptionForm">ici</a> pour vous inscrire.</p>

        </div>
        <?php include 'views/fragments/fragmentFooter.html';?>
    </body>
</html>