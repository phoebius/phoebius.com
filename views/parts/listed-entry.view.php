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