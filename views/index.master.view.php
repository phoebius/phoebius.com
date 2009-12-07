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

$this->expect(
	'release'
);

$this->setMaster(
	'master',
	$this->model
		->spawn()
		->append(array(
			'title' => 'Phoebius Framework: comprehensive ORM and MVC over PHP',
		))
);

?>

  <!--Content-->
  <div class="description">
    <div class="container">
      <ul class="description-list">
        <li class="about">
          <p>
          <b>Phoebius</b> is truly object-oriented PHP5 framework for complex applications, which features a powerful
          <nobr><b>meta&ndash;programming</b></nobr> abilities and a toolset for handling an <b>application flow</b>
          with high cohesion at every valuable architectural level: from receiving the request till sending the response.
          </p>
        </li>
        <li class="about">
         <ul>
           <li>explore rich functionality of autogenerated code</li>
           <li>define request routing and dispatching</li>
           <li>query ORM to fetch entity objects</li>
           <li>encapsulate presentation layer</li>
           <li>extend entity type system</li>
         </ul>
        </li>
        <li class="download">
          <h4>The latest release:</h4>
          <p>
          	Phoebius v<?=$this->release->getVersion()?><br />
          	<i class="note"><?=$this->release->getDate()->toFormattedString('F d, Y')?></i>
          </p>
          <table>
             <tr>
               <td>
                  <div class="button">
                    <div class="rounded l"></div>
                    <div class="label"><a href="/src/phoebius-v<?=$this->release->getVersion()?>.tar.gz">Download now</a></div>
                    <div class="rounded r"></div>
                  </div>
               </td>
             </tr>
           </table>
        </li>
        <li class="changes">
          <?=SiteDocContentBlockRenderer::create()->renderParagraph($this->release->getAbout())?>
          <div class="more"><a href="<?=$this->release->getPage()?>">Learn more</a>&nbsp;<span class="arr">&rarr;</span></div>
        </li>
      </ul>

      <div class="cleaner"></div>

      <div class="block" >
        <div class="cn tl"></div>
        <div class="cn tr"></div>
          <div class="c">
            <ul class="announces">
              <li>
                <h3><a href="/support/a-beginners-guide.html">A Beginners&#146; Guide</a></h3>
                <p><b>Learn</b> how to make the most of Phoebius framework out of the box.</p>
              </li>
              <li>
                <h3><a href="/support/">End-user support</a></h3>
                <p><b>See</b> the <a href="/support/">documentation</a>, <a href="/support/manual/">manual</a> and the <a href="/support/api/">API</a>.</p>
              </li>
              <li>
                <h3><a href="/support/kb/">Possibilities Of Scaling</a></h3>
                <p><b>Implement</b> custom logic and satisfy the needs by extending the ready-to-use toolset.</p>
              </li>
              <li>
                <h3><a href="/feedback/">Submit a Request</a></h3>
                <p>And get the support you need.</p>
              </li>
            </ul>
            <div class="cleaner"></div>
          </div>
        <div class="cn bl"></div>
        <div class="cn br"></div>
      </div>

      <div class="cleaner"></div>
    </div>
  </div>
  <!--Content-->

<?=$this->getUIControl()->getDefaultContent()?>
