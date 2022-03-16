<?php

require_once('Manager.php');

class AppointmentManager extends Manager
{
	public function getAppointment($id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT lastname, firstname, birthdate, phone, mail, appointments.id AS id_appointment, dateHour, DATE_FORMAT(dateHour, "%d %M %Y - %kh%i") AS dateAppointment, idPatients FROM patients INNER JOIN appointments ON appointments.idPatients = patients.id WHERE appointments.id = ? ');
	    $req->execute(array($id));
	    $data = $req->fetch();
	    return $data;
	}

	public function getListAppointments()
	{
		$bdd = $this->dbConnect();
		$req = $bdd->query('SELECT lastname, firstname, birthdate, phone, mail, appointments.id AS id_appointment, dateHour, DATE_FORMAT(dateHour, "%d %M %Y - %kh%i") AS dateAppointment, idPatients FROM patients INNER JOIN appointments ON appointments.idPatients = patients.id ORDER BY dateHour');
		return $req;
	}

	public function getPatientAppointments($id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT lastname, firstname, birthdate, phone, mail, appointments.id, dateHour, DATE_FORMAT(dateHour, "%d %M %Y - %kh%i") AS dateAppointment, idPatients FROM patients INNER JOIN appointments ON appointments.idPatients = patients.id WHERE idPatients = ? ORDER BY dateHour');
	    $req->execute(array($id));
	    return $req;
	}

	public function setAppointment($dateHour, $idPatients)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('INSERT INTO appointments(dateHour, idPatients) VALUES (?, ?)');
	    $req->execute(array($dateHour, $idPatients));
	}

	public function updateappointment($dateHour, $idPatients, $id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('UPDATE appointments SET dateHour = ?, idPatients = ? WHERE id = ?');
	    $req->execute(array($dateHour, $idPatients, $id));
	    return $req;
	}

	public function deleteAppointment($id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('DELETE FROM appointments WHERE id = ?');
		$req->execute(array($id));
	}

	public function deletePatientAppointments($id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('DELETE FROM appointments WHERE idPatients = ?');
		$req->execute(array($id));
	}
}