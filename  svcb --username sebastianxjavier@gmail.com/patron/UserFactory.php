<?php
	include("FactoryInterface.php");
	class UserFactory implements FactoryInterface  {  
		  
		//private static $users = array('Arley'=>'admin', 'Michel'=>'guest', 'Derick'=>'customer');  
	  
	   
		static public function Create($name)  
		{  
			/*if (!isset(self::$users[$name])) {  
			if (!isset(self::$users[$name])) {  
			   throw new Exception('El nombre de usuario '.$name.' es desconocido');  
			} */ 
			//switch (self::$users[$name]) {
			switch ($name) {  
				case 'guest': return new GuestUser($name);  
				case 'customer': return new CustomerUser($name);  
				case 'admin': return new AdminUser($name);  
				default:  
				throw new Exception('Tipo de usario desconocido');  
			}  
		}  
	}
?>