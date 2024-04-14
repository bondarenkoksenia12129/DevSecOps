<?php
class WorkersCll extends Controller {

	public function index($prm) 
	{
		$workers = new WorkersMdl() ;
		
		$list = $workers->getList() ;
		
		$arg['menu']    = $this->view('menu') ;
		$arg['content'] = $this->view('workers_list', array('list'=>$list)) ;
		$this->show($arg) ;
	}
	
}