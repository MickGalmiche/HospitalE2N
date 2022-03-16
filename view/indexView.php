<?php 
$title = 'Accueil - HospitalE2N';
ob_start(); 
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Bienvenue sur le projet <span class="small-caps">HospitalE2N</span></h1>
            <p class="lead text-justify">Le site de ce projet propose une gestion simplifiée des informations des patients, notamment en ce qui concerne leurs données personnelles ou la gestion des rendez-vous auprès de l'établissement.</p>

            <hr class="my-4">

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="?action=liste-patients">Liste des patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=ajout-patient">Formulaire d'ajout de patient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=liste-rendezvous">Liste des rendez-vous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=ajout-rendezvous">Formulaire d'ajout d'un rendez-vous</a>
                </li>
            </ul>

        </div>
    </div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>