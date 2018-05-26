<?php  

class Manufacturer extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function create($input){
		$return = 1;
		try {
			$stmt = $this->conn->prepare('INSERT INTO manufacturer (name) VALUES (:name)');
			$stmt->execute([':name' => $input['name']]);
		} catch (Exception $e) {
			$return = 0;
			$e->getMessage();
		}
		return $return;
	}
}

?>