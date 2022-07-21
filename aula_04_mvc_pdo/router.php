<?php
require 'vendor/autoload.php';

use app\controller\Controller;
use app\controller\Produto;

class Router
{
	private static $query;
	public static function routes($query = null, array $routes)
	{
		$class = null;
		self::$query = $query;
		if (self::$query) {
			self::$query = explode('/', self::$query);
			$class_name = self::$query[0];
			if (count(self::$query) > 1) {
				$method = self::$query[1];
			} else {
				$method = null;
			}
			$param = (count(self::$query) > 2) ? self::$query[2] : null;

			if (isset($routes[$class_name])) {
				$class = new $routes[$class_name];
				if ($class instanceof Controller) {
					if (method_exists($class, $method)) {
						if ($param) {
							$class->$method($param);
						} else {
							$class->$method();
						}
					} else {
						if (method_exists($class, 'index')) {
							$class->index();
						}
					}
				}
			}
		}
		if (!$class) header('HTTP/1.0 404 Not Found');
	}
}

// Get the url path and trim leading slash
$url_path = trim($_SERVER['REQUEST_URI'], '/');
$path = explode('/', $url_path);
array_shift($path);
$path =  implode("/", $path);

Router::routes($path, [
	'produto' => Produto::class,
]);