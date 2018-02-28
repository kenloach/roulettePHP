<?php
class BDD {
	private $bdd;
	private $host = "localhost";
	private $username = "p1716228";
	private $pwd = "308410";
	
	function init() {
		try {
			$this->bdd = new PDO("mysql:host=$this->host;dbname=$this->username;charset=utf8", $this->username, $this->pwd);
		} catch(Exception $e) {
			die('Error '. $e.getMessage());
		}
	}
	
	// Fonctionne mal
	function verifieConnexion($name, $password) {
		$req = $this->bdd->prepare("SELECT password FROM Player WHERE name = ?");
		$req->execute(array($name));

		$res = $req->fetch();
		return $res['password'] == $password;
	}
	
	function ajouterUtilisateur($name, $password) {
		$req = $this->bdd->prepare("INSERT INTO Player (name, password, money) VALUES (?, ?, 0)");
		$req->execute(array($name, $password));
	}

	function majUtilisateur($id, $name) {
		$req = $this->bdd->prepare("UPDATE Player SET money = ? WHERE name = ?");
		$req->execute(array($money, $name));
	}

	function ajouterPartie($player, $bet, $profit) {
		$req = $this->bdd->prepare("INSERT INTO Game (player, date, bet, profit) VALUES (?, NOW(), ?, ?)");
		$req->execute(array($player, $bet, $profit));
	}
}
