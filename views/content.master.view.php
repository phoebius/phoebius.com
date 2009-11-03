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
		'title', 'activeMenuItem', 'forDoxy', 'isAdmin', 'gSearch'
	))
);

?>

<?php $this->setMaster(
	'master',
	Model::create()
		->addCollection(array(
			'title' => $title,
			'activeMenuItem' => $activeMenuItem,
			'forDoxy' => $forDoxy,
			'isAdmin' => $isAdmin,
			'gSearch' => $gSearch
		))
);

$this->renderPartial('parts/pathway');

?>

<?=$this->getUIControl()->getDefaultContent()?>