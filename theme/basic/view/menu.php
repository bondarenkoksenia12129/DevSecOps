<?php	if ($cf['cll']=='huts') {		$hs = 'selected' ;		$ws = '' ;	} elseif($cf['cll']=='workers') {		$ws = 'selected' ;		$hs = '' ;	}?><ul>	<li><a class="<?php echo $hs ?>" href="<?php echo SF ?>?c=huts">Huts</a></li>	<li><a class="<?php echo $ws ?>" href="<?php echo SF ?>?c=workers">Workers</a></li></ul>