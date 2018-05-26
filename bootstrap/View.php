<?php  

class View{

	public function render($filename){
		require 'views/'.$filename.'.php';
	}

}

?>