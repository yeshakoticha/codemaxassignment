<?php  

require 'models/Manufacturer.php';

class ManufacturerController extends Controller{

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->view->data = array('0'=>'Yesha','1'=>'Home');
		$this->view->render('manufacturer/index');
	}

	public function create(){
		$this->view->data = array('0'=>'Yesha','1'=>'Home');
		$this->view->render('manufacturer/create');
	}

	public function store(){
		$return = [];
		$input['name'] = $_POST['name'] ?? 'Maruti';
		$man = new Manufacturer();
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