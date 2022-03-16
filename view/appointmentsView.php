<?php 
$title = 'Liste des RDV - HospitalE2N';
ob_start(); 
?>

    <div class="container col-lg-8 mt-4">
        <div class="card shadow">
            <h2 class="card-header text-center small-caps">Liste des rendez-vous</h2>
            <div class="card-body p-0">

                <ul class="list-group list-group-flush">
                    
                    <?php
                    while ($data = $listAppointments->fetch()) {
                    ?>
                        <li class="list-group-item d-flex flex-wrap justify-content-between align-items-center">
                            <span class="text-capitalize">
                                <?= $data['dateAppointment'] ?> : <?= htmlspecialchars($data['lastname']) ?> <?= htmlspecialchars($data['firstname']) ?>
                            </span>
                            <div class="btn-group">
                                <a class="btn btn-outline-secondary btn-sm" href="?action=rendezvous&id=<?= $data['id_appointment'] ?>">Afficher</a>
                                <a class="btn btn-outline-secondary btn-sm" href="?action=delete-rendezvous&id=<?= $data['id_appointment'] ?>">Supprimer </a>
                                <a class="btn btn-outline-secondary btn-sm" href="?action=profil-patient&id=<?= $data['idPatients'] ?>">Afficher le profil</a>

                            </div>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>

            <a class="card-footer text-center text-muted text-deco-none small-caps" href="?action=ajout-rendezvous">Formulaire d'ajout de rendez-vous</a>
        </div>
    </div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>