<?php
class Autoload {

	public function __construct() {
		spl_autoload_register(array($this, 'loadLib'));
		spl_autoload_register(array($this, 'loadCore'));
		spl_autoload_register(array($this, 'loadCll'));
		spl_autoload_register(array($this, 'loadMdl'));
	}
    
    private function loadCll($class)
	{
		$file = __DIR__.'/controller/' . $class.'.php';
		if (!file_exists($file)) {
			return false;
		}
		require_once $file ;
	}
    
    private function loadMdl($class)
	{
		$file =__DIR__.'/model/' . $class.'.php';
		if (!file_exists($file)) {
			return false;
		}
		require_once $file ;
	}
	
	private function loadLib($class)
	{
		$file = __DIR__.'/../lib/' . $class.'.php';
		if (!file_exists($file)) {
			return false;
		}
		require_once $file ;
	} 
	
	private function loadCore($class)
	{
		$file =__DIR__.'/' . $class.'.php';
		if (!file_exists($file)) {
			return false;
		}
		require_once $file ;
	}
	
}

new Autoload() ;