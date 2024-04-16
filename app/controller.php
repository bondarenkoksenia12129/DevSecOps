<?php
class Controller {
	
	public function run() 
	{
		global $cf ;

        require_once __DIR__.'/autoload.php' ;
        
		new Db() ;
		
        $router = new Router() ;
		
		$clln = $router->getCll() ;
        $cf['cll'] = $clln ;
        $cll = $clln.'cll' ;
		
        $action = $router->getAction() ;
        $prm    = $router->getParams() ;
		
		$cllo = new $cll() ;
        
        $cllo->$action($prm) ;
		 
	}
	
	protected function view($view, $arg = '', $theme = '')
	{
		global $cf ;
		
		if ($theme == '')
			$theme = $cf['default_theme'] ;
			
		if($arg != '') {
			foreach($arg as $key=>$value) {
				${$key} = $value ;
			}
		} 
		
		ob_start() ;
		require_once __DIR__.'/../theme/'.$theme.'/view/'.$view.'.php' ;
		$content = ob_get_contents();
		ob_end_clean();
		return $content ;
	}
	
	protected function show($arg = array(), $template = '', $theme = '')
	{
		global $cf ;
		
		if (!empty($arg)) {
			foreach($arg as $_key => $_value) {
				${$_key} = $_value;
			}
		}
		
		if (!isset($style))   
			$style = '' ;
		if (!isset($script))  
			$script = '' ;
		else {
			$scc = '' ;
			foreach ($script as $sc) {
				$scc .= '<script src="'.$sc.'"></script>' ;
			}
			$script = $scc ;
		}
		if (!isset($menu))    
			$menu = '' ;
		if (!isset($content)) 
			$content = '' ;
		
		if ($template == '')
			$template = $cf['default_template'] ;
		if ($theme == '')
			$theme = $cf['default_theme'] ; 
		
		require_once __DIR__.'/../theme/'.$theme.'/'.$template.'.php' ;
	}
	
}