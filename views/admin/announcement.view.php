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

$this->expect('announcement');

$title = $this->announcement->getId()
	? 'Edit announcement'
	: 'New announcement';

$this->setMaster(
	'content.master',
	new Model (array(
		'title' => $title,
		'breadScrumbs' => array(
			new ViewLink('Admin', '/admin/'),
		),
		'isAdmin' => true,
		'activeMenuItem' => 'New announcement'
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
              <h1><?=$title?></h1>
              <div class="article">
              <form method="post" action="<?=(
              	$this->announcement->getId()
              		? $this->getHref("adminEditAnnouncement", array('id' => $this->announcement->getId()))
              		: $this->getHref("adminNewAnnouncement")
              	)?>">
              	<p>
						<table width="75%">
							<tr>
								<td>Date:&nbsp;</td>
								<td><input type="text" name="data[date]" value="<?=(($pubDate = $this->announcement->getDate()) ? $pubDate->toFormattedString('d.m.Y') : date('d.m.Y') )?>" style="width:100%" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="data[text]" style="width:100%;height:250px"><?=htmlspecialchars($this->announcement->getText())?></textarea>
								</td>
							</tr>
						</table>
				</p>
				<p>
						<input type="submit" name="action" value="Save" />
						<? if ($this->announcement->getId()) { ?>
							<input type="submit" name="action" value="Delete" />
						<? } ?>
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

