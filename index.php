<?php

require('controller/controller.php');

try {

	if (isset($_GET['action']))
	{

		// Tableau regroupant tous les options disponible pour le paramètre 'action'
		$listAction = ['ajout-patient', 'profil-patient', 'liste-patients', 'delete-patient', 'ajout-rendezvous', 'rendezvous', 'liste-rendezvous', 'delete-rendezvous'];

		if (!empty($_GET['action']) && in_array($_GET['action'], $listAction))
		{

			// Création d'un tableau pour cibler les options qui nécessitent obligatoirement une ID
			$listActionId = ['profil-patient', 'delete-patient', 'rendezvous', 'delete-rendezvous'];

			if (in_array($_GET['action'], $listActionId))
			{
				if (isset($_GET['id']) && ctype_digit($_GET['id']) && $_GET['id'] > 0)
				{
					switch ($_GET['action']) {
						case 'profil-patient':
							patient($_GET['id']);
							break;

						case 'delete-patient':
							removePatient($_GET['id']);
							break;

						case 'rendezvous':
							appointment($_GET['id']);
							break;

						case 'delete-rendezvous':
							removeAppointment($_GET['id']);
							break;
						
						default:
							getIndex();
							break;
					}
				}
				else
				{
					throw new Exception("Aucun identifiant n'a été envoyé");
				}
			}
			else {
				switch ($_GET['action']) {
					case 'ajout-patient':
						addPatient();
						break;

					case 'liste-patients':

						// Vérification de la présence et du format/validité des paramètres "page" et "search"
						if (!isset($_GET['page']) || ctype_digit($_GET['page']))
						{
							if (!isset($_GET['search']) || ctype_alpha($_GET['search']))
							{
								listPatients();
							}
							else
							{
								throw new Exception("Cette recherche n'est pas autorisée !");	
							}
						}
						else
						{
							throw new Exception("Identifiant de page absent ou erroné");
						}
						break;

					case 'ajout-rendezvous':
						addAppointment();
						break;

					case 'liste-rendezvous':
						listAppointments();
						break;
					
					default:
						getIndex();
						break;
				}
			}
		}
		else
		{
			throw new Exception("Action absente ou erronée !");
		}
	}
	else
	{
		getIndex();
	}

}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/errorView.php');
}