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

$this->expect('siteDoc');

$this->setMaster(
	'content.master',
	$this->model
		->spawn()
		->append(array(
			'title' => $this->siteDoc->getTitle(),
	))
);

?>

  <!--Content-->
  <div class="content">
    <div class="container column">

      <div class="columns">
         <!--Left panel-->
         <div class="left">
            <div class="container">
            <?php if (@$this->siteDocIndexItem && $this->siteDocIndexItem->getParent()->hasChildren()) { ?>
              <ul class="menu">
              	<?php foreach ($this->siteDocIndexItem->getParent()->getChildren() as $indexItem) { ?>
                <li><a<?=(
                	$indexItem === $this->siteDocIndexItem
                		? ' class="selected"'
                		: ''
                	)
                ?> href="<?=$indexItem->getLink()?>"><?=$indexItem->getName()?></a></li>
                <?php }?>
              </ul>
              <?php }?>
            </div>
         </div>
         <!--Left panel-->
         <!--Main content-->
         <div class="main">
            <div class="container">
              <h1><?=$this->siteDoc->getTitle()?></h1>
              <div class="article">

              <?php if ($this->siteDoc->hasNamedChapters()) { ?>
                <h2>Contents</h2>
                <ul>
                <?php foreach ($this->siteDoc->getChapters() as $chapter) {
				  if (($chapterTitle = $chapter->getTitle())) { ?>
					<li><a href="<?=$this->siteDocIndexItem->getLink()?>#<?=substr(sha1($chapterTitle), 0, 6)?>"><?=$chapterTitle?></a></li>
				   <? } ?>
                <?php }?>
                </ul>
              <?php }?>

              <?php foreach ($this->siteDoc->getChapters() as $chapter) { ?>
              	<?php if ($chapter->getTitle()) {?>
              		<a name="<?=substr(sha1($chapter->getTitle()), 0, 6)?>"></a>
              	<?php }?>
              	<?=$chapter->toHtml(new SiteDocContentBlockRenderer())?>
              <?php }?>
            </div>
         </div>
         <!--Main content-->
      </div>
      <div class="cleaner"></div>

    </div>
  </div>
  <!--Content-->

