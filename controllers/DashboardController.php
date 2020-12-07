<?php
	/**
	 * home del proyecto
	 */
	class DashboardController
	{
		public function index()
		{
			$controller=null;
			require 'views/dashboard.php';
			require 'views/home.php';
			require 'views/footer.php';
		}
		
	}