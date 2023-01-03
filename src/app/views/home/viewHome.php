<?php

/** 
 * This is a PHP view file for the homepage
**/

include 'views/fragments/fragmentHeader.php';
?>
<body>
    <?php include 'views/fragments/fragmentNavbar.php'; ?>

    <div class = "container mt-5 w-75">

        <h1 class="mb-4"><b>Bienvenue sur le site de l'Opération Postes</b></h1>

        <!-- A la une -->
        <div class="card text-bg-success mb-4">
            <h2 class="card-header">À la Une :</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">01/12/2022 : Ajout du <a href="http://postes.smai.emath.fr/2023/CONCOURS/index.php">calendrier de la campagne synchronisée 2023.</a></li>
                <li class="list-group-item">Pour accéder aux pages, un identifiant et un mot de passe sont demandés. L'identifiant est postes et le mot de passe p**** où les étoiles sont l'année en cours.</li>
            </ul>
        </div>

        <!-- Les secteurs -->
        <div class="mb-4">
            <h3>Les activités d'Opération Postes se classent en plusieurs secteurs :</h3>
            <ul class="secteurs">
                <li><b><a href="CONCOURS/index.php">Concours de maître de conférences (MCF) et de professeur des universités (PR)</a></b> :
                    <a href="OUTILS/conseils/index.php">conseils</a>, calendriers, profils de postes, listes d'auditionnés et de classés 
                </li>
                <li><b><a href="CONCOURS/index_crdr.php">Concours de chargé de recherches (CR) et de directeur de recherches (DR)</a></b> : calendriers, profils de postes, listes d'auditionnés et de classés </li>
                <li><b><a href="CONCOURS/index_ecc.php">Concours d'enseignants contractuels (EC) et enseignants chercheurs contractuels (ECC)</a></b>: calendriers, profils de postes, listes d'auditionnés et de classés </li>
                <li><b><a href="AUTRES/index.php">Autres types de postes</a></b> : liste (non exhaustive) des établissements susceptibles d'embaucher des mathématiciens et informaticiens, 
                    postes à l'étranger, &hellip;
                </li>
                <li><b><a href="http://postes.smai.emath.fr/postdoc/">Post-doctorats et ATER</a></b> : annonces d'offres</li>
                <li><b><a href="http://postes.smai.emath.fr/apres/index.php">Après un Premier Recrutement dans l'Enseignement Supérieur</a></b> : informations pour les personnes en poste, 
                    mobilité académique, statistiques, procédure d'échange de postes (<a href="/apres/echanges/index.php">MOUVE</a>)
                </li>
            </ul>
        </div> 
        
        <!-- Les partenaires de l'Opération Postes -->
        <div class="mb-4">
            <h3 class="mb-4">Les partenaires de l'Opération Postes :</h3>
            <div class="row">
                <div class="card m-1 col-md">
                    <a href="http://smai.emath.fr/index.php"><img src="assets/smaiTrans.gif" class="card-img-top" alt="SMAI" height="90"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center">SMAI</h5>
                        <p class="card-text">Société de Mathématiques Appliquées et Industrielles</p>
                    </div>
                </div>
                <div class="card m-1 col-md">
                    <a href="https://smf.emath.fr/"><img src="assets/smf.jpg" class="card-img-top" alt="SMF" height="90"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center">SMF</h5>
                        <p class="card-text">Société Mathématique de France</p>
                    </div>
                </div>
                <div class="card m-1 col-md">
                    <a href="https://www.sfds.asso.fr/"><img src="assets/sfds.png" class="card-img-top" alt="SFdS" height="90"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center">SFdS</h5>
                        <p class="card-text">Société Française de Statistique</p>
                    </div>
                </div>
                <div class="card m-1 col-md">
                    <a href="http://www.societe-informatique-de-france.fr/"><img src="assets/sif.png" class="card-img-top" alt="SIF" height="90"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center">SIF</h5>
                        <p class="card-text">Société Informatique de France</p>
                    </div>
                </div>
                <div class="card m-1 col-md">
                    <a href="https://ardm.eu/"><img src="assets/ardm.png" class="card-img-top" alt="ARDM" height="90"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center">ARDM</h5>
                        <p class="card-text">Association pour la Recherche en Didactique des Mathématiques</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'views/fragments/fragmentFooter.php'; ?>
</body>