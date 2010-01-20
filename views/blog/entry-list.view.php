<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 Scand Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
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
			$this->getModel()->spawn()->set('entry', $entry)
		);
	}

	?>

    </div>
  </div>
  <!--Content-->