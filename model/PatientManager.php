<?php

require_once('Manager.php');

class PatientManager extends Manager
{

	public function getPatients()
	{
		$bdd = $this->dbConnect();
		$req = $bdd->query('SELECT * FROM patients ORDER BY lastname, firstname');
		return $req;
	}

	public function getPagePatients($limit, $offset)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT * FROM patients ORDER BY lastname, firstname LIMIT :limit OFFSET :offset');
	    $req->bindValue('limit', $limit, PDO::PARAM_INT);
	    $req->bindValue('offset', $offset, PDO::PARAM_INT);
	    $req->execute();
	    return $req;
	}

	public function countPatients()
	{
		$bdd = $this->dbConnect();
		$req = $bdd->query('SELECT COUNT(*) FROM patients');
		$countPatients = $req->fetchColumn();
		return $countPatients;
	}

	public function searchPatientFulltext($patient, $limit, $offset)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT * FROM patients WHERE MATCH(lastname, firstname) AGAINST(:patient) LIMIT :limit OFFSET :offset');
		$req->bindValue('patient', $patient, PDO::PARAM_STR);
		$req->bindValue('limit', $limit, PDO::PARAM_INT);
	    $req->bindValue('offset', $offset, PDO::PARAM_INT);
		$req->execute();
		return $req;
	}

	public function searchPatient($patient, $limit, $offset)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT * FROM patients WHERE lastname = :lastname OR firstname = :firstname ORDER BY lastname, firstname LIMIT :limit OFFSET :offset');
		$req->bindValue('lastname', $patient, PDO::PARAM_STR);
		$req->bindValue('firstname', $patient, PDO::PARAM_STR);
		$req->bindValue('limit', $limit, PDO::PARAM_INT);
	    $req->bindValue('offset', $offset, PDO::PARAM_INT);
		$req->execute();
		return $req;
	}

	public function countSearchPatients($patient)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT COUNT(*) FROM patients WHERE lastname = ? OR firstname = ?');
		$req->execute(array($patient, $patient));
		$countPatients = $req->fetchColumn();
		return $countPatients;
	}

	public function getPatient($id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT id, lastname, firstname, birthdate, DATE_FORMAT(birthdate, "%e %M %Y") AS birthdateFormat, phone, mail FROM patients WHERE id = ? ');
	    $req->execute(array($id));
	    $patient = $req->fetch();
		return $patient;
	}

	public function setPatient($lastname, $firstname, $birthdate, $phone, $mail)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('INSERT INTO patients(lastname, firstname, birthdate, phone, mail) VALUES (?, ?, ?, ?, ?)');
	    $req->execute(array($lastname, $firstname, $birthdate, $phone, $mail));
	    return $req;
	}

	public function updatePatient($lastname, $firstname, $birthdate, $phone, $mail, $id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ? WHERE id = ?');
		$req->execute(array($lastname, $firstname, $birthdate, $phone, $mail, $id));
	}

	public function deletePatient($id)
	{
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('DELETE FROM patients WHERE id = ?');
		$req->execute(array($id));
	}
}