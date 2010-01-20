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

$this->accept('query');

$this->setMaster(
	'content.master',
	new Model(array(
		'title' => 'Search',
		'breadScrumbs' => array(
			new ViewLink('Search', '/search/')
		),
		'gSearch' => true
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
              <h1>Search through phoebius</h1>

<style type="text/css">
#content .gsc-control {
	width:100%;
}
</style>
              <div class="article" id="content">Searching...</div>

<script language="Javascript" type="text/javascript">
	var query = '<?=addslashes($this->query)?>';
	var searchControl = new GSearchControl();
	var webSearch = new GwebSearch();
	webSearch.setSiteRestriction ("phoebius.org")
	options = new GsearcherOptions();
	options.setExpandMode (GSearchControl.EXPAND_MODE_OPEN);
	searchControl.addSearcher (webSearch, options);
	searchControl.setResultSetSize (GSearch.LARGE_RESULTSET);
	searchControl.setLinkTarget (GSearch.LINK_TARGET_SELF);
	searchControl.draw (document.getElementById ("content"));
	if (query)
		searchControl.execute(query);
</script>
         </div>
         <!--Main content-->
      </div>
      <div class="cleaner"></div>

    </div>
  </div>
  <!--Content-->

