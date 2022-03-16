<?php

require_once('model/PatientManager.php');
require_once('model/AppointmentManager.php');


function getIndex()
{
	require('view/indexView.php');
}

function listPatients()
{
	$patientManager = new PatientManager();


	// Mise en place des différentes variables pour la pagination
	$page = (!isset($_GET['page']) || $_GET['page'] <= 0 ? 1 : $_GET['page'] );
	$limit = 10;
	$offset = ($page - 1) * $limit;

	$countPatients = ((isset($_GET['search'])) ? $patientManager->countSearchPatients($_GET['search']) : $patientManager->countPatients());
    $nbPages = (($countPatients >= 1) ? ceil($countPatients / $limit) : 1);

    if ($page <= $nbPages)
    {
    	$listPatients = ((isset($_GET['search'])) ? $patientManager->searchPatient($_GET['search'], $limit, $offset) : $patientManager->getPagePatients($limit, $offset));
    }
    else
    {
    	throw new Exception("Cette page n'est pas disponible !");
    }

	require('view/patientsView.php');
}

function patient($id)
{
	$patientManager = new PatientManager();
	$appointmentManager = new AppointmentManager();


	if (isset($_POST['update_patient']))
	{
	    $patientManager->updatePatient($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail'], $id);
	}

	$patient = $patientManager->getPatient($id);
	$listAppointments = $appointmentManager->getPatientAppointments($id);

	require('view/patientView.php');
}

function addPatient()
{
	$patientManager = new PatientManager();

	if (isset($_POST['add_patient']))
	{
	    $patientManager->setPatient($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']);
	}

	require('view/patientFormView.php');
}

function removePatient($id)
{
	$patientManager = new PatientManager();
	$appointmentManager = new AppointmentManager();

	$appointmentManager->deletePatientAppointments($id);
	$patientManager->deletePatient($id);
	listPatients();
}


function listAppointments()
{
	$appointmentManager = new AppointmentManager();

	$listAppointments = $appointmentManager->getListAppointments();

	require('view/appointmentsView.php');
}

function appointment($id)
{
	$appointmentManager = new AppointmentManager();

	if (isset($_POST['update_appointment']))
	{
	    $appointmentManager->updateAppointment($_POST['dateHour'], $_POST['idPatients'], $id);
	}

	$data = $appointmentManager->getAppointment($id);

	// Mise en forme de la date pour l'affichage dans l'input 'datetime-local' du formulaire
	$date = new DateTime($data['dateHour']);
	$date = $date->format('Y-m-d\TH:i:s');

	require('view/appointmentView.php');
}

function addAppointment()
{
	$appointmentManager = new AppointmentManager();

	if (isset($_POST['add_appointment']))
	{
	    $appointmentManager->setAppointment($_POST['dateHour'], $_POST['idPatients']);
	}

	require('view/appointmentFormView.php');
}

function removeAppointment($id)
{
	$appointmentManager = new AppointmentManager();

	$appointmentManager->deleteAppointment($id);
	listAppointments();
}