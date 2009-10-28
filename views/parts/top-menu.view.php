<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * All rights reserved.
 *
 ************************************************************************************************/



?><ul class="navigation">
<?php
	$menu = array(
		'Download' => '/download.html',
		'Support' => '/support/',
		'Blog' => '/blog/',
		'About' => '/about.html'
	);

	foreach ($menu as $item => $url) {
		?><li><a<?=(
			$item == $this->getActiveElement()
				? ' class="selected"'
				: ''
		)?> href="<?=$url?>"><?=$item?></a></li><?
	}
?></ul>