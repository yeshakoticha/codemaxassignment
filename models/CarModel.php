<?php  

class CarModel extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function create($input){
		$return = 1;
		try {
			$stmt = $this->conn->prepare('INSERT INTO car_model (name,manf,color,year,reg_num,note,images) VALUES (:name,:manf,:color,:year,:reg_num,:note,:images)');
			$stmt->execute(
               [':name' => $input['name'],
               ':manf' => $input['manf'],
               ':color' => $input['color'],
               ':year' => $input['year'],
               ':reg_num' => $input['reg_num'],
               ':note' => $input['note'],
               ':images' =>$input['images']]);
		} catch (Exception $e) {
			$return = 0;
			$e->getMessage();
		}
		return $return;
	}

	public function list(){
		$sql = "SELECT count(name) as count,name,manf,id FROM `car_model` where is_sold='0' GROUP by name";
		$result = $this->conn->query($sql, PDO::FETCH_ASSOC);
		return $result->fetchAll();
	}

	public function showData($manf,$name){
		$stmt = $this->conn->prepare("SELECT * FROM `car_model` where manf=:manf and name=:name and is_sold=0");
		$stmt->execute(
               [':manf' => $manf,
               ':name' => $name
               ]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function sellCar($id){
		$stmt = $this->conn->prepare("Update `car_model` set is_sold='1' where id=:id");
		$stmt->execute(
               [':id' => $id]);
		return 1;
		
	}

	public function getManufacturers(){
		$sql = "SELECT * FROM manufacturer";
		$result = $this->conn->query($sql, PDO::FETCH_ASSOC);
		return $result->fetchAll(PDO::FETCH_COLUMN, 1);
	}
}

?>