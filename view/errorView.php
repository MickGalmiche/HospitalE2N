<?php 
$title = 'Page d\'erreur - HospitalE2N';
ob_start(); 
?>

	<div class="container col-lg-6 mt-4">
        <div class="card my-4">
        	<div class="alert alert-warning mb-0" role="alert">
        		<h2 class="alert-heading">Une erreur a été rencontrée !</h2>
        		<p><?= $errorMessage ?></p>
        		<hr>
        		<a href="index.php" class="alert-link">Retour à l'accueil.</a>
        	</div>
        </div>
    </div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>