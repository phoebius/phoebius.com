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

$this->setMaster(
	'content.master',
	new Model(array(
		'title' => 'Phoebius administration',
		'breadScrumbs' => array(
			new ViewLink('Admin', '/admin/')
		),
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
              <h1>Please Log In</h1>
              <div class="article">
              <form method="post" action="<?=$this->getSelfHref()?>">
              	<p>
						<table>
							<tr>
								<td>Email:&nbsp;</td>
								<td><input type="text" name="email" /></td>
							</tr>
							<tr>
								<td>Password:&nbsp;</td>
								<td><input type="password" name="password" /></td>
							</tr>
						</table>
				</p>
				<p>
						<input type="submit" name="do_login" value="Log in" />
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

