<?php  

class App{

	function __construct(){
		$controller = $_GET['controller'] ?? '';
		$method     = $_GET['method'] ?? '';
		$param      = $_GET['param'] ?? '';
		$param2     = $_GET['param2'] ?? '';
		if(!empty($controller)){
			$filename = 'controllers/'.$controller.'Controller.php';
			if(file_exists($filename)){
				require $filename;
				$url = $controller.'Controller';
				$manObj = new $url;
				if(!empty($method)){
					$return = $manObj->{$method}($param,$param2);
				}
			}else{
				die('Looking for something here?');
			}
		}else{
			die('Whooops! Looks like we hit a dead end.');
		}
	}
}

?>