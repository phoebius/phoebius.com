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

$this->expect('entry');

?>
<div class="article">
        <h2>
			<?=$this->getHtmlLink(
				$this->entry->getTitle(),
				'blogEntry',
				array(
					'date' => $this->entry->getPubDate()->toFormattedString('d.m.Y'),
					'entryRestId' => $this->entry->getRestId()
				)
			)?>
        </h2>
        <?=$this->entry->getText()?>
        <ul class="info-panel">
          <li><?=$this->entry->getPubDate()->toFormattedString('F d, Y')?></li>
          <!-- <li><a href="#">tag1</a>, <a href="#">tag2</a>, <a href="#">tag3</a>, <a href="#">tag4</a> </li>  -->
          <?php if (@$this->isAdmin) { ?>
	          <li>
					<?=$this->getHtmlLink(
						'edit',
						'adminEditEntry',
						array('id' => $this->entry->getId())	
					)?> &mdash;
					<?=$this->getHtmlLink(
						'&times;',
						'adminDeleteEntry',
						array('id' => $this->entry->getId())	
					)?>
	          </li>
          <?php }?>
        </ul>
      </div>