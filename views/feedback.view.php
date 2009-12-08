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

$this->accept('submitted');

$this->setMaster(
	'content.master',
	new Model(array(
		'title' => 'Phoebius feedback',
		'breadScrumbs' => array(
			new ViewLink('Support Page', '/support/')
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
              <h1>Feedback</h1>
              <div class="article">

			<?php if ($this->submitted) { ?>
				<p>Your message has been received, and we will reply as soon as possible.</p>
				<p>Thanks.</p>
			<?php } else { ?>
              <p>Your opinion is very valuable for us.</p>
              <p>We do our best to provide a comprehensive development toolset, so we are open to
              any type of feedback, and are ready to participate in discussion of our product.</p>
              <p>Send your questions, proposals and ideas to <a href="mailto:feedback@phoebius.org">feedback@phoebius.org</a>, or submit the following
              form:</p>
             <form method="post" action="/feedback/">
              	<p>
						<table width="75%">
							<tr>
								<td width="100px">Your name:&nbsp;</td>
								<td><input type="text" name="name" style="width:100%" /></td>
							</tr>
							<tr>
								<td>Email:&nbsp;</td>
								<td><input type="text" name="email" style="width:100%" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="text" style="width:100%;height:250px"></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2" id="qwertyuiopasdfghjklzxcvbnm">
									<textarea name="message" style="width:100%;height:250px"></textarea>
								</td>
							</tr>
						</table>
				</p>
				<p>
						<input type="submit" name="do_send" value="Send" />
				</p>
				</form>
			<?php }?>
            </div>
         </div>
         <!--Main content-->
      </div>
      <div class="cleaner"></div>

    </div>
  </div>
  <!--Content-->

