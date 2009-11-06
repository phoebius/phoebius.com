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

$this->accept('breadScrumbs');

?><div class="pathway">
  <div class="container">
  <?php

  	if (!is_array($this->breadScrumbs)) {
  		$this->breadScrumbs = array();
  	}

  	$pathWay = array();

  	$pathWay[] = '<a href="/">Home</a>';

  	foreach ($this->breadScrumbs as $item) {
  		$pathWay[] = '<a href="' . $item->getAddress() . '">' . $item->getName() . '</a>';
  	}

  	echo join('&nbsp;<span class="arr">&rarr;</span>&nbsp;', $pathWay);

  ?>
  </div>
</div>