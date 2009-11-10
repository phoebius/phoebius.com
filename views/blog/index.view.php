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

$this->setMaster(
	'content.master',
	Model::create(array(
		'title' => 'Phoebius blog'
	))
);

$this->renderPartial('blog/paginated-entry-list');
