<?php
namespace Algo\Nomenclatures;
use \PDO;
class Connexion {
	private static $DB;
	public static function connect() {
	try {
		self::$DB = new \PDO('mysql:host=localhost;dbname=nomenclature;charset=utf8', 'root', '');
		self::$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	return $this->DB;
	}

	public static function getDB() {
		return self::$DB;
	}
}

// test







?>