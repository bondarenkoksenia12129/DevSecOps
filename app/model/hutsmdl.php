<?phpclass HutsMdl extends Model {		public function getList()	{		global $cf ;		$list = array() ;				$q = "SELECT id, name, description, price, state FROM hut" ;			$result = $cf['dbh']->query($q) ;		while ($row = $result->fetch_assoc()) {			$workers = array() ;			$hut_id = $row['id'] ;			$row['workers'] = $this->getWorkers($hut_id) ;			$list[] = $row ;		}		return $list ;	}		public function getStateEnum()	{		global $cf ;				$q = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS			  WHERE TABLE_NAME = 'hut' AND COLUMN_NAME = 'state'" ;		$result = $cf['dbh']->query($q) ;		$row = $result->fetch_array();		$list = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));				return $list ;	}		public function addHut()	{		global $cf ;				$name        = $_POST['name'] ;		$description = $_POST['description'] ;		$price       = $_POST['price'] ;		$state       = $_POST['state'] ;		$workers     = $_POST['workers'] ;				$q = "INSERT INTO hut (name, description, price, state) VALUES('$name', '$description', '$price', '$state')" ;		$cf['dbh']->query($q);		$hut_id = $cf['dbh']->insert_id ; 				foreach ($workers as $worker_id)  {			$q = "INSERT INTO hut_worker (hut_id, worker_id) VALUES('$hut_id', '$worker_id')" ;			$cf['dbh']->query($q);		}			}		public function getHut($prm)	{		global $cf ;		$hut_id = $prm['hut_id'] ;				$q = "SELECT id, name, description, price, state FROM hut WHERE id = '$hut_id'" ;			$result = $cf['dbh']->query($q) ;		while ($row = $result->fetch_assoc()) {			$row['workers'] = $this->getWorkers($row['id']) ;			return $row ;		}			}		public function updateHut($prm)	{		global $cf ;		$hut_id = $prm['hut_id'] ;				$name        = $_POST['name'] ;		$description = $_POST['description'] ;		$price       = $_POST['price'] ;		$state       = $_POST['state'] ;		$workers     = $_POST['workers'] ;				$q = "UPDATE hut SET name        = '$name', 							 description = '$description', 							 price       = '$price', 							 state       = '$state' 		      WHERE id = '$hut_id'" ;		$cf['dbh']->query($q) ;				$q = "DELETE FROM hut_worker WHERE hut_id = '$hut_id'" ;		$cf['dbh']->query($q) ;				foreach ($workers as $worker_id)  {			$q = "INSERT INTO hut_worker (hut_id, worker_id) VALUES('$hut_id', '$worker_id')" ;			$cf['dbh']->query($q);		}			}		public function deleteHut($hut_id)	{		global $cf ;				$q = "DELETE FROM hut WHERE id = '$hut_id'" ;		$cf['dbh']->query($q) ;	}		private function getWorkers($hut_id)	{		global $cf ;				$qa = "SELECT w.id, w.name FROM worker w INNER JOIN hut_worker hw 			   ON w.id = hw.worker_id WHERE hw.hut_id = '$hut_id'" ;		$resulta = $cf['dbh']->query($qa) ;		while ($rowa = $resulta->fetch_assoc()) {			$workers[] = $rowa ;		}		return $workers ;	}	}