<?php
namespace Algo\Nomenclatures;

class MountLoader {

	public static function defLoader() {
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	public static function autoload($class) {
		echo 'class = ' .$class .'<br>';
		$class = str_replace(__NAMESPACE__, '', $class);
		echo $class.'<br>';
		require $class .'.class.php';
	}
}






?>