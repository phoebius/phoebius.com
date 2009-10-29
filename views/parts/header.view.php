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
		'title', 'activeMenuItem', 'breadScrumbs', 'forDoxy'
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
    <ul class="navigation">
<?php
	$menu = array(
		new ViewLink('Download', '/download.html'),
		new ViewLink('Support', '/support/'),
		new ViewLink('Blog', '/blog/'),
		new ViewLink('About', '/about.html'),
	);

	foreach ($menu as $item) {
		?><li><a<?=(
			$item->getName() == $activeMenuItem
				? ' class="selected"'
				: ''
		)?> href="<?=$item->getAddress()?>"><?=$item->getName()?></a></li><?
	}
?></ul>
    <ul class="shortcuts">
      <li><a title="Sitemap" href="/sitemap/">
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
<div class="pathway">
  <div class="container">
  <?php

  	array_unshift($breadScrumbs, new ViewLink('Home', '/'));

  	$pathWay = array();
  	foreach ($breadScrumbs as $item) {
  		$pathWay[] = '<a href="' . $item->getAddress() . '">' . $item->getName() . '</a>';
  	}

  	echo join('&nbsp;<span class="arr">&rarr;</span>&nbsp;', $pathWay);

  ?>
  </div>
</div>
