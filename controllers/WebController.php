<?php
	/**
	 * home del proyecto
	 */
	class WebController
	{
		public function index()
		{
			require 'views/web.php';
			
		}

		public function logout()
		{
			if($_SESSION['usuario']) {
				session_destroy();
				header('Location: ?controller=web');
			}	
		}
		
	}