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

$this->expect('announcements');

?>
<table class="news">
<? foreach ($this->model["announcements"] as $ann) { ?>
	<tr>
		<td class="date"><i><?=$ann->getDate()->toFormattedString('Y/m/d')?></i></td>
		<td class="ann">
			<?=$ann->getText()?>
			<? if ($this->isAdmin) { ?>
				&#151; <?=$this->getHtmlLink('edit', 'adminEditAnnouncement', array('id' => $ann->getId()))?>
			<? } ?>
		</td>
	</tr>
<? } ?>
</table>
