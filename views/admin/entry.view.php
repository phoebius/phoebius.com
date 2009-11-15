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

$this->setMaster(
	'content.master',
	Model::create(array(
		'title' => 'Phoebius administration',
		'breadScrumbs' => array(
			new ViewLink('Admin', '/admin/'),
		),
		'isAdmin' => true,
		'activeMenuItem' => 'New blog entry'
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
            </div>
         </div>
         <!--Left panel-->
         <!--Main content-->
         <div class="main">
            <div class="container">
              <h1>Entry</h1>
              <div class="article">
              <form method="post" action="<?=$this->getHref(
					'adminEditEntry',
					array( 'id' => $this->entry->getId() )
				)?>">
              <input type="hidden" name="id" value="<?=$this->entry->getId()?>" />
              	<p>
						<table width="75%">
							<tr>
								<td width="100px">Title:&nbsp;</td>
								<td><input type="text" name="entryData[title]" value="<?=htmlspecialchars($this->entry->getTitle())?>" style="width:100%" /></td>
							</tr>
							<tr>
								<td>URL:&nbsp;</td>
								<td><input type="text" name="entryData[restId]" value="<?=htmlspecialchars($this->entry->getRestId())?>" style="width:100%" /></td>
							</tr>
							<tr>
								<td>Date:&nbsp;</td>
								<td><input type="text" name="entryData[pubDate]" value="<?=(($pubDate = $this->entry->getPubDate()) ? $pubDate->toFormattedString('d.m.Y') : date('d.m.Y') )?>" style="width:100%" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="entryData[text]" style="width:100%;height:250px"><?=htmlspecialchars($this->entry->getText())?></textarea>
								</td>
							</tr>
						</table>
				</p>
				<p>
						<input type="submit" name="do_save" value="Save" />
				</p>
				</form>
            </div>
         </div>
         <!--Main content-->
      </div>
      <div class="cleaner"></div>

    </div>
  </div>
  <!--Content-->

