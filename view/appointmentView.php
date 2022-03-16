<?php 
$title = 'Fiche RDV - HospitalE2N';
ob_start(); 
?>

    <div class="container col-lg-8 mt-4">
        <div class="card my-4 shadow">
            <h2 class="card-header small-caps text-center">Fiche de Rendez-vous</h2>
            <div class="card-body">
                <h3 class="card-title"><?= $data['dateAppointment'] ?></h3>
                <p class="card-subtitle"><?= htmlspecialchars($data['lastname']) ?> <?= htmlspecialchars($data['firstname']) ?></p>
            </div>
            <a class="card-footer text-center text-muted text-deco-none small-caps" href="?action=profil-patient&id=<?= $data['idPatients'] ?>">Afficher la fiche du patient</a>
        </div>

        <div class="card my-4 shadow">
            <h2 class="card-header small-caps text-center">Formulaire de modification de RDV</h2>
            <div class="card-body">
                <form class="form-inline" method="POST" action="">
                    <label for="dateHour" class="sr-only">Date</label>
                    <div class="col-md-6 input-group my-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="input1">Date</span>
                        </div>
                        <input class="form-control" aria-label="dateHour" aria-describedby="input1" type="datetime-local" name="dateHour" id="dateHour" value="<?= $date ?>" />
                    </div>
                    <div class="col-md-4 input-group my-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="input2">PatientID</span>
                        </div>
                        <input class="form-control" aria-label="idPatients" aria-describedby="input2" type="number" name="idPatients" id="idPatients" value="<?= $data['idPatients'] ?>" />
                    </div>

                    <input class="btn btn-outline-secondary col-md-2 small-caps my-1" type="submit" name="update_appointment" value="Modifier">
                </form>
            </div>
        </div>
    </div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>