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

$this->expect('entries');

$this->accept('isAdmin');

?><!--Content-->
  <div class="content">
    <div class="container">

	<?php foreach ($this->entries as $entry) {
		$this->renderPartial(
			'parts/listed-entry',
			Model::create()->set('entry', $entry)
		);
	}

	?>

    </div>
  </div>
  <!--Content-->