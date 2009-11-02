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

$this->setMaster(
	'content.master',
	Model::create()
		->addCollection(array(
			'title' => 'Phoebius administration',
			'breadScrumbs' => array(
				new ViewLink('Admin', '/admin/')
			),
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
              <h1>Please Log In</h1>
              <div class="article">
              <form method="post" action="/admin/">
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

