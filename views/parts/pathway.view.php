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
		'breadScrumbs',
	))
);

?><div class="pathway">
  <div class="container">
  <?php

  	if (!is_array($breadScrumbs)) {
  		$breadScrumbs = array();
  	}
  	array_unshift($breadScrumbs, new ViewLink('Home', '/'));

  	$pathWay = array();
  	foreach ($breadScrumbs as $item) {
  		$pathWay[] = '<a href="' . $item->getAddress() . '">' . $item->getName() . '</a>';
  	}

  	echo join('&nbsp;<span class="arr">&rarr;</span>&nbsp;', $pathWay);

  ?>
  </div>
</div>