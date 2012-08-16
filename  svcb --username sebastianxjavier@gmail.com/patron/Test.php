<?php
	class Test
	{
		function boolToStr($b)  
		{  
			if ($b == true) {  
				return "Si\n";  
			} else {  
				return "No\n";  
			}  
		}

		function qwe()
		{
			return 'genda<br>';		
		}
		  
		function displayPermissions(User $obj)  
		{		
			//print $obj->getName() . ' permiso:</br>';  
			print 'sda'.qwe();
			/*print 'Lectura: ' . boolToStr($obj->hasReadPermission()).'</br>';  
			print 'Modificar: ' . boolToStr($obj->hasModifyPermission()).'</br>';  
			print 'Escritra: ' . boolToStr($obj->hasDeletePermission()).'</br>';  */
		}  
		  
		function displayRequirements(User $obj)  
		{  
			if ($obj->wantsFlashInterface()) {  
				print $obj->getName() . ' requiere Flash </br></br>';  
			}  
		}  
		  
		/*$logins = array('Arley', 'Michel', 'Derick');
		  
		foreach($logins as $login)  
		{  
			displayPermissions(UserFactory::Create($login));  
			print '</br>';  
			displayRequirements(UserFactory::Create($login));  
		}  */  
	}
?>