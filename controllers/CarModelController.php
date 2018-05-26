<?php  

require 'models/CarModel.php';

class CarModelController extends Controller{

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->view->render('car_model/index');
	}

	public function getData(){
		$modelObj = new CarModel();
		$data = $modelObj->list();
		$html = '';
		$count = 1;
		if(!empty($data)){
			foreach ($data as $key) {
				$html.="<tr>";	
				$html.="<td>$count</td>";	
				$html.="<td>".$key['manf']."</td>";	
				$html.="<td>".$key['name']."</td>";	
				$html.="<td>".$key['count']."</td>";	
				$html.="<td><a href='".URL."CarModel/details/".$key['manf']."/".$key['name']."'>Details</a></td>";	
				$html.="</tr>";	
				$count++;	
			}
		}
		$return = [];
		if(!empty($data)){
			$return['flag'] = 1;
			$return['data']  = $html;
		}
		
		print_r(json_encode($return));
	}

	public function details($manf,$name){
		$modelObj = new CarModel();
		$this->view->data = $modelObj->showData($manf,$name);
				
		$this->view->render('car_model/sell');
	}

	public function create(){
		$modelObj = new CarModel();
		$this->view->manufacturers = $modelObj->getManufacturers();
		$this->view->render('car_model/create');
	}

	public function sell($id){
		$modelObj = new CarModel();
		$result = $modelObj->sellCar($id);
		$return = [];
		if(!empty($result)){
			$return['flag'] = 1;
			$return['msg']  = 'Car sold';
		}
		print_r(json_encode($return));
	}

	public function store(){
		$return = [];
		
		$files = $_FILES['files'] ?? [];
		$total = count($files['name']);
		$images = '';

		if(!empty($files)){			
			$uploaddir = 'assets/img/uploads/';
			if (!file_exists($uploaddir)) {
			    mkdir($uploaddir, 0777, true);
			}

			for($i=0;$i<count($files['name']);$i++){
            	$tmpfile = $files['tmp_name'][$i];
            	$filename = $files['name'][$i];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $temp = 'assets/img/uploads/';
               	$newfilename = time().rand().'.'.$ext;
               	$images.= $temp.$newfilename.',';
                move_uploaded_file($tmpfile,$temp.$newfilename);
            }
		}

		
		$input['name'] = $_POST['name'] ?? '';
		$input['manf'] = $_POST['manf'] ?? '';
		$input['color'] = $_POST['color'] ?? '';
		$input['year'] = $_POST['year'] ?? '';
		$input['reg_num'] = $_POST['reg_num'] ?? '';
		$input['note'] = $_POST['note'] ?? '';
		$input['images'] = $images ?? '';
	
		$man = new CarModel();
		$result = $man->create($input);
		if($result){
			$return['flag'] = $result;
			$return['msg']  = 'Data saved successfully.';
		}else{
			$return['flag'] = 0;
			$return['msg']  = 'Failed to save data';
		}
		
		print_r(json_encode($return));
	}

}

?>