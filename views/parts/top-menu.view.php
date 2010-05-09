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

$this->accept('isAdmin', 'activeMenuItem');

?>
<ul class="navigation">
<?php
	$menu = array(
		'Download' => '/download.html',
		'Support' => '/support/',
		'News' => '/news/',
		'About' => '/about.html'
	);

	foreach ($menu as $item => $url) {
		?><li><a<?=(
			$item == $this->activeMenuItem
				? ' class="selected"'
				: ''
		)?> href="<?=$url?>"><?=$item?></a></li><?
	}

	if ($this->isAdmin) {
		?>
		<li><a<?=(
			$item == $this->activeMenuItem
				? ' class="selected"'
				: ''
		)?> href="/admin/announcement/">Announcement</a></li>
		<li><?=$this->getHtmlLink('Releases', 'adminReleases')?></li>
		<?
	}
?></ul>