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
	'title'
);

$this->accept(
	'activeMenuItem', 'forDoxy', 'isAdmin', 'gSearch'
);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title><?=$this->title?></title>

  <?php if ($this->gSearch) { ?>
	<link href="http://www.google.com/uds/css/gsearch.css" type="text/css" rel="stylesheet">
	<script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=ABQIAAAAAnOPGWpvs9KTKLnNT45LABSGpwI8LAIVwrMkDhsm7XR6QRyo9hQKOiUGnI7BVs4ctFA42qIBQuSuVA" type="text/javascript"></script>
  <?php } ?>

  <?php if ($this->forDoxy) {?>
  	<link href="/css/tabs.css" rel="stylesheet" type="text/css" />
  <?php }?>

  <link href="/css/layout.css" rel="stylesheet" type="text/css" />
  <link href="/css/common.css" rel="stylesheet" type="text/css" />

  <?php if ($this->forDoxy) {?>
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
    <form method="get" action="/search/">
      <input type="text" name="query" id="header_search" style="color:#999; width:185px;" value="search" onfocus="if(!this._value){this._value=this.value;this.value='';}" onblur="if(!this.value){this.value=this._value;this._value=null;}" />
      <!-- <a title="Search" href="/search/"><img style="vertical-align:middle"
      alt="Search" width="16" height="16" src="/images/icons/search.gif" /></a> -->
      <input type="submit" id="searchbutton" value="" name="do_search" style="vertical-align:middle" />
     </form>
    </div>
  </div>
</div>