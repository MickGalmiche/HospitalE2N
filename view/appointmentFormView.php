<?php 
$title = 'Formulaire de RDV - HospitalE2N';
ob_start(); 
?>
	<div class="container col-lg-8 mt-4">

        <div class="card my-2 shadow">
            <h2 class="card-header small-caps text-center">Formulaire d'ajout de RDV</h2>
            <div class="card-body">
                <form class="form-inline" method="POST" action="">

                    <div class="col-md-6 input-group my-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="input1">Date</span>
                        </div>
                        <input class="form-control" aria-label="dateHour" aria-describedby="input1" type="datetime-local" name="dateHour" id="dateHour" placeholder="aaaa-mm-jj h:m:s" required />
                    </div>
                    <div class="col-md-4 input-group my-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="input2">PatientID</span>
                        </div>
                        <input class="form-control" aria-label="idPatients" aria-describedby="input2" type="number" name="idPatients" id="idPatients" value="<?php if (isset($_GET['idPatients'])) { echo $_GET['idPatients']; } ?>" required />
                    </div>

                    <input class="btn btn-outline-secondary col-md-2 small-caps my-1" type="submit" name="add_appointment" value="Enregistrer">
                </form>
            </div>
        </div>
    </div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>