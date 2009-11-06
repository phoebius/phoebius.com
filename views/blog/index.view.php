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
	Model::from(array(
		'title' => 'Phoebius blog'
	))
);

$this->renderPartial('blog/paginated-entry-list');
