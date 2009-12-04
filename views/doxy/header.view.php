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

$this->renderPartial(
	'parts/header',
	$this->getModel()->spawn()
		->set('title', '$title &#151; Phoebius Framework')
);

$this->renderPartial('parts/pathway');
