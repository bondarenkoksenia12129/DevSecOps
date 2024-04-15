<?php
class Router {

	public function getCll() 
	{
		if (isset($_GET['c'])) {
			if (strpos ($_GET['c'], '-') !== FALSE) {
                $c = preg_replace('/-/', '', $_GET['c']); 
                return $c ;
			} else {
                return $_GET['c'] ;
            }
		} else {
			return 'huts' ;
		}
	}
	
	public function getAction() 
	{
		if (isset($_GET['a'])) {
            if (strpos ($_GET['a'], '-') !== FALSE) {
                $a = preg_replace('/-/', '', $_GET['a']); 
                return $a ;
			} else {
                return $_GET['a'] ;
            }
		} else {
			return 'index' ;
		}
	}
    
    public function getParams()
    {
        $prm = array() ;
        foreach ($_GET as $key => $value) {
            if ($key == 'c')
                continue ;
            if ($key == 'a')
                continue ;
            $prm[$key] = $value ;
        }
        return $prm ;
    }
	
}