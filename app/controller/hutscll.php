<?php
class HutsCll extends Controller {

	public function index($prm) 
	{
		$huts = new HutsMdl() ;
		
		$this->index_delete($prm, $huts) ;
	}
	
	public function addForm($prm)
	{
		$huts    = new HutsMdl() ;
		$workers = new WorkersMdl() ;
		
		$state_enum   = $huts->getStateEnum() ;
		$workers_list = $workers->getList() ;
		
		$arg['script'] = array('./lib/js/jquery.js', 
							   './lib/js/jquery.validate.min.js',
							   './lib/js/hut.validate.js',
							   ) ;
		$arg['menu']    = $this->view('menu') ;
		$arg['content'] = $this->view('hut_form', 
									   array('prm'=>$prm,
									         'state_enum'=>$state_enum,
										     'workers_list'=>$workers_list,
									   )) ;
		$this->show($arg) ;
	}
	
	public function add($prm)
	{
		$huts = new HutsMdl() ;
		
		$huts->addHut() ;
		$huts_list = $huts->getList() ;
		$arg['menu']    = $this->view('menu') ;
		$arg['content'] = $this->view('huts_list', array('prm'=>$prm,'huts_list'=>$huts_list)) ;
		$this->show($arg) ;
	}
	
	public function editForm($prm)
	{
		$huts    = new HutsMdl() ;
		$workers = new WorkersMdl() ;
		
		$this->edit_save($prm, $huts, $workers) ;
	}
	
	public function save($prm)
	{
		$huts    = new HutsMdl() ;
		$workers = new WorkersMdl() ;
		
		$huts->updateHut($prm) ;
		
		$this->edit_save($prm, $huts, $workers) ;
	}
	
	public function deleteHut($prm)
	{
		$huts = new HutsMdl() ;
		
		$huts->deleteHut($prm['hut_id']) ;
		
		$this->index_delete($prm, $huts) ;
	}
	
	private function edit_save($prm, $huts, $workers)
	{
		$hut          = $huts->getHut($prm) ;
		$state_enum   = $huts->getStateEnum() ;
		$workers_list = $workers->getList() ;
		
		$arg['script'] = array('./lib/js/jquery.js', 
							   './lib/js/jquery.validate.min.js',
							   './lib/js/hut.validate.js',
							   ) ;
		$arg['menu']    = $this->view('menu') ;
		$arg['content'] = $this->view('hut_form', 
									   array('prm'=>$prm,
									         'hut'         =>$hut,
											 'state_enum'  =>$state_enum,
										     'workers_list'=>$workers_list,
									   )) ;
		$this->show($arg) ;
	}
	
	private function index_delete($prm, $huts)
	{
		$huts_list = $huts->getList() ;
		
		$arg['menu']    = $this->view('menu') ;
		$arg['content'] = $this->view('huts_list', 
									  array('prm'=>$prm,
											'huts_list'=>$huts_list,
									  )) ;
		$this->show($arg) ;
	}
	
}