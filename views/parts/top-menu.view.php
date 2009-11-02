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

extract(
	$this->getVariables(array(
		'isAdmin', 'activeMenuItem'
	))
);

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
			$item == $activeMenuItem
				? ' class="selected"'
				: ''
		)?> href="<?=$url?>"><?=$item?></a></li><?
	}

	if ($isAdmin) {
		?><li><a<?=(
			$item == $activeMenuItem
				? ' class="selected"'
				: ''
		)?> href="/admin/entry/">New blog entry</a></li><?
	}
?></ul>