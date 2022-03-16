<?php

class Manager
{
	protected function dbConnect()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$bdd->query("SET lc_time_names = 'fr_FR'");
		return $bdd;
	}
}
