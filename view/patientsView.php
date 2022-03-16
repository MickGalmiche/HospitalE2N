<?php 
$title = 'Liste des patients- HospitalE2N';
ob_start(); 
?>

    <div class="container col-lg-8 mt-4">
        <div class="card shadow">
            <h2 class="card-header text-center small-caps">Liste des patients</h2>
            <div class="card-body p-0">

                <?php
                    if (isset($_GET['search']))
                    {
                        ?>
                            <h3 class="mt-2 card-title text-center">Résultat(s) de la recherche : <em>"<?= htmlspecialchars($_GET['search']) ?>"</em></h3>
                        <?php
                    }
                ?>

                <ul class="list-group list-group-flush">
                    
                    <?php
                    while ($data = $listPatients->fetch()) {
                        ?>
                        <li class="list-group-item d-flex flex-wrap justify-content-between align-items-center">
                            <span class="text-capitalize">
                                <?= htmlspecialchars($data['lastname']) ?> <?= htmlspecialchars($data['firstname']) ?>
                            </span>
                            <div class="btn-group">
                                <a class="btn btn-outline-secondary btn-sm" href="?action=profil-patient&id=<?= $data['id'] ?>">Afficher</a>
                                <a class="btn btn-outline-secondary btn-sm" href="?action=delete-patient&id=<?= $data['id'] ?>">Supprimer</a>
                                <a class="btn btn-outline-secondary btn-sm" href="?action=ajout-rendezvous&idPatients=<?= $data['id'] ?>">Ajout RDV</a>
                            </div>
                        </li>
                        <?php
                    }
                    ?>

                </ul>


                <nav aria-label="Page navigation">
                    <ul class="pagination my-3 justify-content-center">
                        <li class="page-item <?php if ($page == 1) { echo 'disabled'; } ?>">
                            <a class="page-link" href="?action=liste-patients<?php if(isset($_GET['search'])) { echo "&search=".htmlspecialchars($_GET['search']); } ?>">
                                <i class="fas fa-angle-double-left" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="page-item <?php if ($page <= 1) { echo 'disabled'; } ?>">
                            <a class="page-link" href="?action=liste-patients<?php if(isset($_GET['search'])) { echo "&search=".htmlspecialchars($_GET['search']); } ?>&page=<?php echo $page - 1; ?>">
                                <i class="fas fa-angle-left" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="page-item disabled" >
                            <span class="page-link" >Page <?= $page ?> sur <?= $nbPages ?></span>
                        </li>
                        <li class="page-item <?php if ($page == $nbPages) { echo 'disabled'; } ?>">
                            <a class="page-link" href="?action=liste-patients<?php if(isset($_GET['search'])) { echo "&search=".htmlspecialchars($_GET['search']); } ?>&page=<?php echo $page + 1; ?>">
                                <i class="fas fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="page-item <?php if ($page == $nbPages) { echo 'disabled'; } ?>">
                            <a class="page-link" href="?action=liste-patients<?php if(isset($_GET['search'])) { echo "&search=".htmlspecialchars($_GET['search']); } ?>&page=<?= $nbPages ?>">
                                <i class="fas fa-angle-double-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
            <a class="card-footer text-center text-muted text-deco-none small-caps" href="?action=ajout-patient">Formulaire d'ajout de patient</a>
        </div>
    </div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>