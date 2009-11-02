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
		'title', 'activeMenuItem', 'forDoxy', 'isAdmin'
	))
);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title><?=$title?></title>

  <?php if ($forDoxy) {?>
  	<link href="/support/api/tabs.css" rel="stylesheet" type="text/css" />
  <?php }?>

  <link href="/css/layout.css" rel="stylesheet" type="text/css" />
  <link href="/css/common.css" rel="stylesheet" type="text/css" />
  <?php if ($forDoxy) {?>
  	<link href="/css/doxy.css" rel="stylesheet" type="text/css" />
  <?php }?>
</head>
<body id="layout">
<div class="header">
  <div class="container">
    <a href="/"><img class="logo" alt="Phoebius framework" src="/images/logo.jpg" /></a>
    <?php $this->renderPartial('parts/top-menu');?>
    <ul class="shortcuts">
      <li><a title="Sitemap" href="/sitemap.html">
      <img class="map"  alt="Sitemap" width="16" height="16" src="/images/blank.gif"/></a></li>
      <li><a title="E-mail" href="/feedback/">
      <img class="mail" alt="E-mail" width="16" height="16" src="/images/blank.gif"/></a></li>
    </ul>
    <div class="search">
      <input style="color:#999; width:185px;" value="search"/>
      <a title="Search" href="/search/"><img style="vertical-align:middle"
      alt="Search" width="16" height="16" src="/images/icons/search.gif" /></a>
    </div>
  </div>
</div>

<?=$this->getUIControl()->getDefaultContent()?>

<div class="footer">
  <div class="container">
    <p>
     All questions and proposals<br />
     are welcomed at <a href="mailto:feedback@phoebius.org">feedback@phoebius.org</a>
    </p>
    <div class="copy">
      <p>&copy; 2009 Phoebius.org</p>
    </div>
  </div>
</div>

</body>
</html>