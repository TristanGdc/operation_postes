<?php 

/** 
 * This is a PHP view file to let the user know his registration worked
**/

include 'views/fragments/fragmentHeader.php'; 
?>

<body>
    <?php include 'views/fragments/fragmentNavbar.php';?>

    <div class="container mt-5 w-50">

        <h1 class="mb-4"><b>Inscription réussie !</b></h1>

        <h5>Retour à <a href="router.php?action=home">l'accueil</a> ou <a href="router.php?action=loginForm">connexion</a>.</h5>

    </div>
    <?php include 'views/fragments/fragmentFooter.php';?>
</body>
