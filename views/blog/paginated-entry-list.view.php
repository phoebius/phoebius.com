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

$this->expect(
	'countLeft', 'countRight', 'notIndexPage',
	'entries'
);

$this->accept('isAdmin');

?><!--Content-->
  <div class="content">
    <div class="container">

	<?php foreach ($this->entries as $entry) {
		$this->renderPartial(
			'parts/listed-entry',
			$this->model->spawn()->set('entry', $entry)
		);
	}

	?>

      <ul class="paging">
		<?php if ($this->countLeft) { ?>
			<li><span class="arr">&larr;</span> <a href="/blog/?skip=<?php echo $this->countLeft; ?>"><b>Previous</b></a></li>
		<?php } else { ?>
			<li class="passive"><span class="arr">&larr;</span> <b>Previous</b></li>
		<?php }?>

		<?php if ($this->countRight) { ?>
			<li><a href="/blog/?skip=<?php echo $this->countRight; ?>"><b>Next</b></a> <span class="arr">&rarr;</span></li>
		<?php } elseif ($this->notIndexPage) { ?>
			<li><a href="/blog/"><b>Next</b></a> <span class="arr">&rarr;</span></li>
		<?php } else { ?>
			<li class="passive"><b>Next</b></a> <span class="arr">&rarr;</span></li>
		<?php }?>

      </ul>

    </div>
  </div>
  <!--Content-->