<?php
	abstract class User {  
  
		protected $name = NULL;  
		  
		public function __construct($name)  
		{  
			$this->name = $name;
		}  
	  
		public function getName()  
		{  
			return $this->name;  
		}  
	  
		public function hasReadPermission()  
		{  
			return true;  
		}  
	  
		public function hasModifyPermission()  
		{  
			return false;
		}  
	  
		public function hasDeletePermission()  
		{  
			return false;  
		}  
	  
		public function wantsFlashInterface()  
		{  
			return true;  
		}  
	}
	
	class GuestUser extends User { }
	
	class CustomerUser extends User {
		
	   function hasModifyPermission()  
		{  
			return true;  
		}  
	}
	
	class AdminUser extends User {  
  
		public function hasModifyPermission()  
		{  
			return true;  
		}  
	  
		public function hasDeletePermission()  
		{  
			return true;  
		}  
	  
		public function wantsFlashInterface()  
		{  
			return false;  
		}  
	}
?>	

  