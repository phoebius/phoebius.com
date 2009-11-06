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

$this->accept('isAdmin', 'activeMenuItem');

?>
<ul class="navigation">
<?php
	$menu = array(
		'Download' => '/download.html',
		'Support' => '/support/',
		'Blog' => '/blog/',
		'About' => '/about.html'
	);

	foreach ($menu as $item => $url) {
		?><li><a<?=(
			$item == $this->activeMenuItem
				? ' class="selected"'
				: ''
		)?> href="<?=$url?>"><?=$item?></a></li><?
	}

	if ($this->isAdmin) {
		?><li><a<?=(
			$item == $this->activeMenuItem
				? ' class="selected"'
				: ''
		)?> href="/admin/entry/">New blog entry</a></li><?
	}
?></ul>