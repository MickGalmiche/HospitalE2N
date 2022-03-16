<?php 
$title = 'Formulaire patient- HospitalE2N';
ob_start(); 
?>

	<div class="container col-lg-8 mt-4">
		<div class="card my-2 shadow">
            <h2 class="card-header text-center small-caps">Formulaire d'ajout de patient</h2>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="lastname">Nom</label>
                            <input class="form-control form-control-sm bg-light" type="text" name="lastname" id="lastname" />
                        </div>
                        <div class="form-group col">
                            <label for="firstname">Prénom</label>
                            <input class="form-control form-control-sm bg-light" type="text" name="firstname" id="firstname" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="birthdate">Date de Naissance</label>
                            <input class="form-control form-control-sm bg-light" type="date" name="birthdate" id="birthdate" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Numéro de Téléphone</label>
                            <input class="form-control form-control-sm bg-light" type="tel" name="phone" id="phone" placeholder="" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mail">E-mail</label>
                            <input class="form-control form-control-sm bg-light" type="email" name="mail" id="mail" />
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <input class="btn btn-outline-secondary small-caps" type="submit" name="add_patient" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
	</div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>