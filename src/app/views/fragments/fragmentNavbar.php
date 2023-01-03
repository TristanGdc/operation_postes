  <nav class="navbar shadow navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">

    <!-- Opération postes navbar logo -->
    <a class="navbar-brand" href="router.php?action=home">
      <img src="assets/logo.png">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left side part of the navbar -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- Homepage -->
        <li class="nav-item">
          <a class="nav-link" href="router.php?action=home">Accueil</a>
        </li>

        <!-- Outils pratiques (dropdown) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="router.php?action=" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Outils pratiques
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=">Koi 2.9 ?</a></li>
            <li><a class="dropdown-item" href="router.php?action=">Conseils</a></li>
            <li><a class="dropdown-item" href="router.php?action=">FAQ</a></li>
            <li><a class="dropdown-item" href="router.php?action=">Qui sommes-nous ?</a></li>
          </ul>
        </li>

      </ul>

      <!-- Right side part of the navbar -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">

        <!-- Authentication menu -->
        <li class="nav-item dropdown">
          <?php 
          if(!isset($_SESSION)) 
          {session_start();}

          //If the user isn't logged in (display register and login dropdown options)
          if(!isset($_SESSION['PK_user_id'])){
            echo('
              <a class="nav-link dropdown-toggle" href="router.php?action=loginForm" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Connexion
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="router.php?action=loginForm">Connexion</a></li>
                <li><a class="dropdown-item" href="router.php?action=registerForm">Inscription</a></li>
              </ul>
            ');

          //If the user is logged in (display profile and logout dropdown options)
          }else{
            echo('
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Connecté
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="router.php?action=">Profil</a></li>
                <li><a class="dropdown-item" href="router.php?action=logout">Déconnexion</a></li>
              </ul>
          ');
          }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>