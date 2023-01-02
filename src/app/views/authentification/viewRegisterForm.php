<?php include 'views/fragments/fragmentHeader.php'; ?>
<body>
    <?php include 'views/fragments/fragmentNavbar.php';?>

    <div class="container mt-5 w-50">

        <?php
        // Affichage des erreurs d'inscription
        if(isset($_GET['reg_err']))
        {
            $err = htmlspecialchars($_GET['reg_err']);
            echo('<div class="alert alert-warning" role="alert">');
            switch ($err) {
                case "wrong-password-retype" :
                    echo('Les mots de passe ne correspondent pas');
                    break;
                case "existing-email" :
                    echo("L'adresse email est déjà utilisée");
                    break;
                case "empty-field" :
                    echo('Merci de remplir tous les champs');
                    break;
                case "email-format" :
                    echo("Merci d'utiliser un format d'email valide");
                    break;
                case "long-email" :
                    echo("L'adresse email ne peut pas dépasser 50 caractères");
                    break;
            }
            echo('</div>');
        }
        ?>

        <form action="router.php?action=inscription" method="post">
            <h1><b>Inscription</b></h1>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="required">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control mb-3" id="password" name="password" placeholder="mot de passe" required="required">
                <input type="password" class="form-control" id="password_retype" name="password_retype" placeholder="retaper le mot de passe" required="required">
            </div>
            <button type="submit" class="btn btn-success">Inscription</button>
        </form>
        
    </div>
    <?php include 'views/fragments/fragmentFooter.html';?>
</body>
</html>