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
		'entry'
	))
);

$this->setMaster(
	'content.master',
	Model::create()
		->addCollection(array(
			'title' => 'Phoebius administration',
			'breadScrumbs' => array(
				new ViewLink('Admin', '/admin/'),
			),
			'isAdmin' => true,
			'activeMenuItem' => 'New blog entry'
		))
); ?>

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
              <form method="post" action="/admin/entry/<?=(($id = $entry->getId()) ? "?id=$id" : "")?>">
              <input type="hidden" name="id" value="<?=$entry->getId()?>" />
              	<p>
						<table width="75%">
							<tr>
								<td width="100px">Title:&nbsp;</td>
								<td><input type="text" name="entryData[title]" value="<?=htmlspecialchars($entry->getTitle())?>" style="width:100%" /></td>
							</tr>
							<tr>
								<td>URL:&nbsp;</td>
								<td><input type="text" name="entryData[restId]" value="<?=htmlspecialchars($entry->getRestId())?>" style="width:100%" /></td>
							</tr>
							<tr>
								<td>Date:&nbsp;</td>
								<td><input type="text" name="entryData[pubDate]" value="<?=(($pubDate = $entry->getPubDate()) ? $pubDate->toFormattedString('d.m.Y') : date('d.m.Y') )?>" style="width:100%" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="entryData[text]" style="width:100%;height:250px"><?=htmlspecialchars($entry->getText())?></textarea>
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

