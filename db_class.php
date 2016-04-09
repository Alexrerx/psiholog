<?php

/**
* Database
*/
class DB
{
	
	private $host = 'mysql.hostinger.ru';
	private $dbname = 'u330380592_data';
	private $charset = 'utf8';
	private $user = 'u330380592_root';
	private $pass = 'DBwBeYZyD8';

	private $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	
	function __construct()
	{
		$dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
		$this->pdo = new PDO($dsn, $this->user, $this->pass, $this->opt);
	}

	function fetchDate($date)
	{

		$stmt = $this->pdo->prepare('SELECT time FROM booking WHERE date = ?');
		$stmt->execute([$date]);

		$dateTime = array();

		while ($row = $stmt->fetch(PDO::FETCH_LAZY))
		{
				$time = new DateTime($row->time);
				$timeFormatted = $time->format('H:i');
				$dateTime[] = $timeFormatted;
		}
		return $dateTime;
	}

	function insertItem($date, $time, $firstName, $lastName, $phone, $email, $game, $players) {

		$stmt = $this->pdo->prepare("INSERT INTO booking (date, time, firstname, lastname, phone, email, game, players) VALUES (:date, :time, :firstname, :lastname, :phone, :email, :game, :players)");
		
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':time', $time);
		$stmt->bindParam(':firstname', $firstName);
		$stmt->bindParam(':lastname', $lastName);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':game', $game);
		$stmt->bindParam(':players', $players);

		//return ($date, $time, $firstName, $lastName, $phone, $email, $game, $players);
		return $stmt->execute();
	}

	function fetchRequests($date, $ymd)
	{

		$stmt = $this->pdo->prepare('SELECT * FROM booking WHERE `date` = ? ORDER BY `time` ASC');
		$stmt->execute([$date]);

		$requests = array();

		while ($row = $stmt->fetch(PDO::FETCH_LAZY))
		{
			$rTime = $row->time;
			$rDate = $row->date;
			$time = new DateTime($row->time);
			$date = new DateTime($row->date);
			$firstName = $row->firstname;
			$lastName = $row->lastname;
			$phone = $row->phone;
			$email = $row->email;
			$game = $row->game;
			$players = $row->players;
			$timeFormatted = $time->format('H:i');
			$dateFormatted = $date->format('m.d');
			$requests[] = ["rtime" => $rTime, "rdate" => $rDate,"ymd" => $ymd, "time" => $timeFormatted, "day" => $dateFormatted, "firstname" => $firstName, "lastname" => $lastName, "phone" => $phone, "email" => $email, "game" => $game, "players" => $players];
		}
		return $requests;
	}

	function removeRequest($date, $time) {
		$stmt = $this->pdo->prepare('DELETE FROM booking WHERE `date` = :date AND `time` = :time');
		
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':time', $time);

		$stmt->execute();
	}

	function checkUserByVK($id) {

		$stmt = $this->pdo->prepare('SELECT * FROM users WHERE `vk` = ?');
		$stmt->execute([$id]);

		$row = $stmt->fetch(PDO::FETCH_LAZY);

		if (isset($row['name']) && isset($row['img'])) {
			return $row;
		}

	}

	function updateUserLast($id) {
		$stmt = $this->pdo->prepare('UPDATE users SET last = CURRENT_TIMESTAMP WHERE vk = ?');
		$stmt->execute([$id]);
	}
}

?>