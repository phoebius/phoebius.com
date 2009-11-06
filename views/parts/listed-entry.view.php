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
        	<a href="/blog/<?=$this->entry->getPubDate()->toFormattedString('d.m.Y')?>/<?=$this->entry->getRestId()?>"><?=$this->entry->getTitle()?></a>
        </h2>
        <?=$this->entry->getText()?>
        <ul class="info-panel">
          <li><?=$this->entry->getPubDate()->toFormattedString('F d, Y')?></li>
          <!-- <li><a href="#">tag1</a>, <a href="#">tag2</a>, <a href="#">tag3</a>, <a href="#">tag4</a> </li>  -->
          <?php if ($this->isAdmin) { ?>
	          <li>
		          <a href="/admin/entry/?id=<?=$this->entry->getId()?>">edit</a> &mdash;
		          <a href="/admin/entry/delete/?id=<?=$this->entry->getId()?>"><font color="red">&times;</font></a>
	          </li>
          <?php }?>
        </ul>
      </div>