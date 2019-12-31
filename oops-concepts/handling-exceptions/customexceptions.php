<?php 
class myException extends Exception { 
	function get_Message() { 
		
		// Error message 
		$errorMsg = 'Error on line '.$this->getLine(). 
					' in '.$this->getFile() 
		.$this->getMessage().' is number zero'; 
		return $errorMsg; 
	} 
} 

function demo($a) { 
	try { 
	
		// Check if 
		if($a == 0) { 
			throw new myException($a); 
		} 
	} 
	
	catch (myException $e) { 
	
		// Display custom message 
		echo $e->get_Message(); 
	} 
} 

// This will not generate any exception 
demo(5); 

// It will cause an exception 
demo(0); 
?> 

