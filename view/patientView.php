<?php 
$title = 'Profil de patient- HospitalE2N';
ob_start(); 
?>

    <div class="container col-lg-8 mt-4">
        <div class="card-deck my-4">
            <div class="card shadow">
                <h2 class="card-header small-caps text-center">Profil du patient</h2>
                <div class="card-body">
                    <h3 class="card-title text-capitalize text-center mb-3"><?= htmlspecialchars($patient['lastname']) ?> <?= htmlspecialchars($patient['firstname']) ?></h3>
                    <p class="card-text text-muted">
                        Né le <?= htmlspecialchars($patient['birthdateFormat']) ?><br/>
                        N° de téléphone: <?= htmlspecialchars($patient['phone']) ?><br/>
                        E-mail: <?= htmlspecialchars($patient['mail']) ?><br/>
                    </p>
                </div>
            </div>
            <div class="card shadow">
                <h2 class="card-header small-caps text-center">Rendez-vous</h2>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <?php
                        while ($data = $listAppointments->fetch()) 
                        {
                        ?>
                            <li class="list-group-item list-group-item-light d-flex flex-wrap justify-content-between align-items-center">
                                <span>
                                    <?= $data['dateAppointment'] ?>
                                </span>
                                <div>
                                    <a class="text-secondary" href="?action=rendezvous&id=<?= $data['id'] ?>"><i class="far fa-edit"></i></a>
                                    <a class="text-secondary" href="?action=delete-rendezvous&id=<?= $data['id'] ?>"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <a class="card-footer text-center text-muted text-deco-none small-caps" href="?action=ajout-rendezvous&idPatients=<?= $patient['id'] ?>">Ajouter un rendez-vous</a>
            </div>
        </div>
        <div class="card my-4 shadow">
            <h2 class="card-header small-caps text-center">Formulaire de modification du profil</h2>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="lastname">Nom</label>
                            <input class="form-control form-control-sm bg-light" type="text" name="lastname" id="lastname" value="<?= htmlspecialchars($patient['lastname']) ?>" />
                        </div>
                        <div class="form-group col">
                            <label for="firstname">Prénom</label>
                            <input class="form-control form-control-sm bg-light" type="text" name="firstname" id="firstname" value="<?= htmlspecialchars($patient['firstname']) ?>" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-4">
                            <label for="birthdate">Date de Naissance</label>
                            <input class="form-control form-control-sm bg-light" type="date" name="birthdate" id="birthdate" value="<?= htmlspecialchars($patient['birthdate']) ?>" />
                        </div>
                        <div class="form-group col-sm-6 col-md-4">
                            <label for="phone">Numéro de Téléphone</label>
                            <input class="form-control form-control-sm bg-light" type="tel" name="phone" id="phone" value="<?= htmlspecialchars($patient['phone']) ?>" />
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="mail">E-mail</label>
                            <input class="form-control form-control-sm bg-light" type="email" name="mail" id="mail" value="<?= htmlspecialchars($patient['mail']) ?>" />
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <input class="btn btn-outline-secondary small-caps" type="submit" name="update_patient" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>

    

<?php 
$content = ob_get_clean();
require('template.php'); 
?>