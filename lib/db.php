<?php
class Db {

	public function __construct() {
		
		global $cf ;
		$cf['dbh'] = new mysqli(
			$cf['hostname'],
			$cf['username'],
			$cf['password'],
			$cf['database']
		);
		
		if (!$cf['dbh']->set_charset("utf8"))
			printf("Error loading character set utf8: %s\n", $dbh->error);
        
        $cf['username'] = '' ;
        $cf['password'] = '' ;
        $cf['database'] = '' ;
		
	}

}