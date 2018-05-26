<?php  

class Connection extends PDO{

	function __construct(){
		parent::__construct('mysql:host=localhost;dbname=thestoc2_inventory;', 'thestoc2_invadmn', 'V7WK{;yKPRF?');
	}
}

?>