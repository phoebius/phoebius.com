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

$this->expect('releases');

$this->setMaster(
	'content.master',
	new Model (array(
		'title' => 'Releases',
		'breadScrumbs' => array(
			new ViewLink('Admin', '/admin/'),
		),
		'isAdmin' => true,
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
              <h1>Releases</h1> 
              <div class="article">
              <p><?=$this->getHtmlLink('Create new', 'adminNewRelease')?></p>
              <p>
              <table class="news">
              <? foreach ($this->releases as $release) { ?>
				<tr>
					<td class="date">
						<?=$this->getHtmlLink(
							$release->getDate(),
							'adminEditRelease',
							array('id' => $release->getId())
						)?>
					</td>
					<td class="date">
						<?=$this->getHtmlLink(
							$release->getVersion(),
							'adminEditRelease',
							array('id' => $release->getId())
						)?>
					</td>
					<td class="ann"><?=$release->getDescription()?></td>
				</tr>
              <? } ?>
              </table>
              </p>
            </div>
         </div>
         <!--Main content-->
      </div>
      <div class="cleaner"></div>

    </div>
  </div>
  <!--Content-->

