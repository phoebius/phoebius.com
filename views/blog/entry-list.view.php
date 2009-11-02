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
		'entries', 'isAdmin',
	))
);

?><!--Content-->
  <div class="content">
    <div class="container">

	<?php foreach ($entries as $entry) { ?>

      <div class="article">
        <h2><a href="/blog/<?php echo $entry->getPubDate()->toFormattedString('d.m.Y');?>/<?php echo $entry->getRestId();?>"><?php echo $entry->getTitle();?></a></h2>
        <?php echo $entry->getText();?>
        <ul class="info-panel">
          <li><?=$entry->getPubDate()->toFormattedString('F d, Y')?></li>
          <!-- <li><a href="#">tag1</a>, <a href="#">tag2</a>, <a href="#">tag3</a>, <a href="#">tag4</a> </li>  -->
          <?php if ($isAdmin) { ?>
          	<li>
          		<a href="/admin/entry/?id=<?=$entry->getId()?>">edit</a> &mdash;
          		<a href="/admin/entry/delete/?id=<?=$entry->getId()?>"><font color="red">&times;</font></a>
          	</li>
          <?php }?>
        </ul>
      </div>

	<?php }?>

    </div>
  </div>
  <!--Content-->